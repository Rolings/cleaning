<?php

namespace App\Services\Checkout;

use App\Models\Price;
use App\Models\Service;
use App\Models\State;
use Illuminate\Support\Collection;
use Livewire\Wireable;
use App\Contracts\Livewire\CheckoutDataInterface;

class CheckoutService implements Wireable
{

    /**
     * @var string|null
     */
    public ?string $name = null;

    /**
     * @var string|null
     */
    public ?string $first_name = null;

    /**
     * @var string|null
     */
    public ?string $last_name = null;

    /**
     * @var string|null
     */
    public ?string $phone = null;

    /**
     * @var string|null
     */
    public ?string $email = null;

    /**
     * @var int|null
     */
    public ?int $state_id = null;

    /**
     * @var string|null
     */
    public ?string $city = null;

    /**
     * @var string|null
     */
    public ?string $zip = null;

    /**
     * @var string|null
     */
    public ?string $address = null;

    /**
     * @var string|null
     */
    public ?string $apt_suite = null;

    /**
     * @var string|null
     */
    public ?string $datetime = null;

    /**
     * @var string|null
     */
    public ?string $comment = null;

    /**
     * @var int|null
     */
    public ?int $service_id = null;

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

        $this->services = Service::with('prices.roomType.prices')->onlyActive()->get();
    }

    public function updateState(State|null $state): void
    {
        if (is_null($state)) {
            return;
        }

        $this->city = $state->capital;

        $this->zip = $state->zip;
    }

    public function selectServices(array $selectedServicesId): void
    {
        $this->selectedServices = $this->services->filter(function ($service) use ($selectedServicesId) {
            return in_array($service->id, $selectedServicesId);
        });

        $this->rooms = $this->selectedServices
            ->pluck('prices')
            ->flatten()
            ->pluck('roomType')
            ->unique('id')
            ->sortBy('name');

        $this->additionalServices = $this->selectedServices
            ->pluck('additional')
            ->flatten()
            ->unique('id')
            ->sortBy('name');

        $this->calculateCostServices();
    }

    public function selectRooms(array $selectedRoomId): void
    {
        $this->selectedRooms = $this->rooms->filter(function ($roomType) use ($selectedRoomId) {
            return in_array($roomType->id, $selectedRoomId);
        });
    }

    public function selectRoomsCount(array $selectedRoomCount): void
    {
        $list = $this->selectedRooms->pluck('id')->toArray();

        $this->selectedRoomsCount = collect($selectedRoomCount)->filter(function ($item, $roomId) use ($list) {
            return in_array($roomId, $list);
        });

        $this->calculateCostRooms();
    }

    public function selectAdditionalServices(array $selectedAdditionalServicesId): void
    {
        $this->selectedAdditionalServices = $this->additionalServices->filter(function ($service) use ($selectedAdditionalServicesId) {
            return in_array($service->id, $selectedAdditionalServicesId);
        });

        $this->calculateCostAdditionalServices();
    }


    private function calculateCostServices(): void
    {
        $this->costServices = $this->selectedServices->sum('price');
    }

    public function calculateCostAdditionalServices(): void
    {
        $this->costAdditionalServices = $this->selectedAdditionalServices->sum('price');
    }

    public function calculateCostRooms(): void
    {
        //dd($this->selectedRooms,$this->selectedRoomsCount);

    }
}
