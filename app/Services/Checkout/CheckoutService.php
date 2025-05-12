<?php

namespace App\Services\Checkout;

use App\Models\Price;
use App\Models\Service;
use App\Models\Setting;
use App\Models\State;
use App\Traits\CheckoutTrait;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
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
    public Collection $states;

    /**
     * @var Collection
     */
    public Collection $services;

    public Collection $rooms;

    /**
     * @var Collection
     */
    public Collection $prices;

    /**
     * @var Collection
     */
    public Collection $additionalServices;

    /**
     * @var Collection
     */
    public Collection $selectedServices;

    /**
     * @var Collection
     */
    public Collection $selectedRooms;

    /**
     * @var Collection
     */
    public Collection $selectedRoomsCount;

    /**
     * @var Collection
     */
    public Collection $selectedAdditionalServices;


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

    public function setDatetime(?string $datetime): self
    {
        if (is_null($datetime)) {
            return $this;
        }

        $this->datetime = Carbon::parse($datetime);

        return $this;
    }

    public function setState(?int $stateId): self
    {
        if (is_null($stateId)) {
            return $this;
        }

        $state = State::find($stateId);

        $this->city = $state->capital;

        $this->zip = $state->zip;

        return $this;
    }

    public function setServices(array $selectedServicesId): self
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

        return $this;
    }

    public function setRooms(array $selectedRoomId): self
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

        return $this;
    }

    public function setRoomsCount(array $selectedRoomCount): self
    {
        $rooms = $this->selectedRooms->pluck('id')->toArray();

        $this->selectedRoomsCount = collect($selectedRoomCount)->filter(function ($item, $roomId) use ($rooms) {
            return in_array($roomId, $rooms);
        });

        $this->calculateCostRooms();

        return $this;
    }

    public function setAdditionalServices(array $selectedAdditionalServicesId): self
    {
        $this->selectedAdditionalServices = $this->additionalServices->filter(function ($service) use ($selectedAdditionalServicesId) {
            return in_array($service->id, $selectedAdditionalServicesId);
        });

        $this->calculateCostAdditionalServices();

        return $this;
    }

    public function setDefaultSelectedRooms(array $baseIds, array $overrideValues): array
    {
        foreach ($overrideValues as $key => $value) {
            if (is_int($key) && is_int($value) && !isset($overrideValues[$value])) {
                $overrideValues[$value] = 1;
                unset($overrideValues[$key]);
            }
        }

        return array_reduce($baseIds, function ($carry, $id) use ($overrideValues) {
            $carry[$id] = $overrideValues[$id] ?? 1;
            return $carry;
        }, []);
    }

    public function getDefaultServiceRoom()
    {
        return $this->selectedServices
            ->pluck('rooms')
            ->flatten()
            ?->pluck('id')
            ?->toArray() ?? [];
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

    public function calculateCostAdditionalServices(): void
    {
        $this->costAdditionalServices = $this->selectedAdditionalServices->sum('price');

        $this->calculateTotalConst();
    }

    public function calculateCostRooms(): void
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

    public function calculateTotalConst(): void
    {
        $this->totalCost = $this->costServices
            + $this->costAdditionalServices
            + $this->selectedRoomsPrices;
    }

}
