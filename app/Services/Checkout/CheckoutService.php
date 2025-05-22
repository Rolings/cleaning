<?php

namespace App\Services\Checkout;

use App\Models\Service;
use App\Models\Setting;
use App\Models\State;
use App\Traits\CheckoutTrait;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Livewire\Wireable;
use App\Contracts\Livewire\CheckoutDataInterface;

class CheckoutService implements Wireable
{
    use CheckoutTrait;

    /**
     * @var float|int
     */
    public float $totalCost = 0;

    /**
     * @var float|int
     */
    public float $costServices = 0;

    /**
     * @var float|int
     */
    public float $costAdditionalServices = 0;

    /**
     * @var float|int
     */
    public float $taxAmount = 0;

    /**
     * @var float|int
     */
    public float $discountAmount = 0;

    /**
     * @var float|int
     */
    public float $taxPercentage = 0;

    /**
     * @var float|int
     */
    public float $discountPercentage = 0;

    /**
     * @var Collection
     */
    public Collection $prices;

    public int $selectedRoomsPrices = 0;


    public function __construct()
    {
        $this->init();
    }

    public function toLivewire()
    {
        return get_object_vars($this);
    }

    public static function fromLivewire($value)
    {
    }


    public function loadData(CheckoutDataInterface $data): void
    {
        foreach (get_object_vars($data) as $key => $val) {
            if (property_exists($this, $key)) {
                $this->{$key} = $val;
            }
        }
    }

    protected function init()
    {
        $this->selectedServices = new Collection();

        $this->selectedRooms = new Collection();

        $this->selectedRoomsCount = new Collection();

        $this->additionalServices = new Collection();

        $this->selectedAdditionalServices = new Collection();

        $this->rooms = new Collection();

        $this->states = State::onlyActive()->get();

        $this->services = Service::with([
            'prices.roomType.prices',
            'prices.roomType.additional',
            'prices.roomType',
            'rooms'
        ])
            ->onlyActive()
            ->get();

        $this->taxPercentage = Setting::findByKey('tax_percentage')?->value ?? 0;

        $this->discountPercentage = Setting::findByKey('discount_percentage')?->value ?? 0;
    }

    public function setName(?string $firstName, ?string $lastName, $callback = null): self
    {
        $this->first_name = $firstName;

        $this->last_name = $lastName;

        if ($callback) {
            $callback($this->first_name . ' ' . $this->last_name);
        }

        return $this;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->first_name = $firstName;

        return $this;
    }

    public function setLastName(?string $lastName): self
    {
        $this->last_name = $lastName;

        return $this;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function setAptSuite(?int $aptSuite): self
    {
        $this->apt_suite = $aptSuite;

        return $this;
    }

    public function setDatetime(?string $datetime, $callback = null): self
    {
        $this->datetime = is_null($datetime)
            ? Carbon::now()
            : Carbon::parse($datetime);

        if ($callback) {
            $callback($this->datetime);
        }

        return $this;
    }

    public function setState(?int $state): self
    {
        if (is_null($state)) {
            return $this;
        }

        $state = State::find($state);

        $this->state_id = $state->id;

        $this->city = $state->capital;

        $this->zip = $state->zip;

        return $this;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function setZip(?string $zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    public function setServices(array $selectedServicesId, $callback = null): self
    {
        $this->selectedServices = $this->services->filter(function ($service) use ($selectedServicesId) {
            return in_array($service->id, $selectedServicesId);
        });

        $this->prices = $this->selectedServices
            ->pluck('prices')
            ->flatten();

        $this->rooms = $this->selectedServices
            ->pluck('prices')
            ->flatten()
            ->pluck('roomType')
            ->filter(fn($room) => $room->active)
            ->unique('id')
            ->sortBy('name');

        if (!$this->selectedRooms->count()) {
            $this->selectedRooms = $this->selectedServices
                ->pluck('rooms')
                ->flatten()
                ->filter(fn($room) => $room->active);
        }

        $this->calculateCostServices();

        if (!is_null($callback)) {
            $callback(
                $this->selectedServices,
                $this->rooms,
                $this->selectedRooms,
            );
        }

        return $this;
    }

    public function setRooms(array $selectedRoomId, $callback = null): self
    {
        $this->selectedRooms = $this->rooms->filter(function ($roomType) use ($selectedRoomId) {
            return in_array($roomType->id, $selectedRoomId);
        });

        $this->additionalServices = $this->selectedRooms
            ->pluck('additional')
            ->flatten()
            ->unique('id')
            ->sortBy('name');

        $this->calculateCostRooms();

        if (!is_null($callback)) {
            $callback(
                $this->selectedRooms,
                $this->additionalServices,
            );
        }

        return $this;
    }

    public function setRoomsCount(array $selectedRoomCount, $callback = null): self
    {
        $rooms = $this->selectedRooms->pluck('id')->toArray();

        $this->selectedRoomsCount = collect($selectedRoomCount)->filter(function ($item, $roomId) use ($rooms) {
            return in_array($roomId, $rooms);
        });

        $this->calculateCostRooms();

        if (!is_null($callback)) {
            $callback($this->selectedRoomsCount);
        }

        return $this;
    }

    public function setAdditionalServices(array $selectedAdditionalServicesId, $callback = null): self
    {
        $this->selectedAdditionalServices = $this->additionalServices->filter(function ($service) use ($selectedAdditionalServicesId) {
            return in_array($service->id, $selectedAdditionalServicesId);
        });

        $this->calculateCostAdditionalServices();

        if (!is_null($callback)) {
            $callback($this->selectedAdditionalServices);
        }

        return $this;
    }

    public function setDefaultSelectedRooms(array $baseIds, array $overrideValues, $callback = null): self
    {
        foreach ($overrideValues as $key => $value) {
            if (is_int($key) && is_int($value) && !isset($overrideValues[$value])) {
                $overrideValues[$value] = 1;
                unset($overrideValues[$key]);
            }
        }

        $data = array_reduce($baseIds, function ($carry, $id) use ($overrideValues) {
            $carry[$id] = $overrideValues[$id] ?? 1;
            return $carry;
        }, []);

        if (!is_null($callback)) {
            $callback($data);
        }

        return $this;
    }

    public function getDefaultServiceRoom($callback = null): self
    {
        $data = $this->selectedServices
            ->pluck('rooms')
            ->flatten()
            ?->pluck('id')
            ?->toArray() ?? [];

        if (!is_null($callback)) {
            $callback($data);
        }

        return $this;
    }

    public function getFullName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    private function calculateCostServices(): void
    {
        $this->costServices = $this->selectedServices->sum('price');

        $this->calculateTotalConst();
    }

    private function calculateCostAdditionalServices(): void
    {
        $this->costAdditionalServices = $this->selectedAdditionalServices->sum('price');

        $this->calculateTotalConst();
    }

    private function calculateCostRooms(): void
    {
        $finalPrice = 0;

        $this->selectedRoomsCount->each(function (float $count, int $id) use (&$finalPrice) {
            $price = $this->prices->firstWhere('room_type_id', $id);

            if (!$price || $count < $price->room_quantity) {
                return;
            }

            $extraUnits = max(0, $count - 1);
            $finalPrice += $price->price_by_unit + ($extraUnits * $price->price_for_next_unit);
        });

        $this->selectedRoomsPrices = $finalPrice;

        $this->calculateTotalConst();
    }

    private function calculateTotalConst(): void
    {
        $this->totalCost = $this->costServices
            + $this->costAdditionalServices
            + $this->selectedRoomsPrices;
    }

    /**
     * @param $callback
     * @return $this|self
     */
    public function buildAddressByZip($callback): self
    {
        // Валідація ZIP
        if (!preg_match('/^\d{5}$/', $this->zip)) {
            return $this->resetAddressFields();
        }

        try {
            $response = Http::get("http://api.zippopotam.us/us/{$this->zip}");

            if ($response->failed()) {
                return $this->resetAddressFields();
            }

            $place = $response->json('places.0');

            if (!$place) {
                return $this->resetAddressFields();
            }

            $abbreviation = $place['state abbreviation'] ?? null;
            if ($abbreviation) {
                $state = State::findByAll($abbreviation)->first();
                $this->state_id = $state?->id;
                $this->state = $state?->name;
            }

            $this->city = $place['place name'] ?? null;

            $this->address = trim("{$this->state}, {$this->city}");
            $this->apt_suite = null;

            $callback(
                $this->state_id,
                $this->city,
                $this->address,
                $this->apt_suite
            );


        } catch (\Throwable $e) {
            logger()->error("Address lookup by ZIP failed: {$e->getMessage()}");

            return $this->resetAddressFields();
        }

        return $this;
    }

    private function resetAddressFields(): self
    {
        $this->address = null;
        $this->apt_suite = null;
        $this->city = null;
        $this->state = null;
        $this->state_id = null;

        return $this;
    }
}
