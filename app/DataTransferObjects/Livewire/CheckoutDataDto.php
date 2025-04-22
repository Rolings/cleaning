<?php

namespace App\DataTransferObjects\Livewire;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Livewire\Wireable;

class CheckoutDataDto implements Wireable
{
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

    /**
     * @var Collection
     */
    public Collection $roomTypes;

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
    public Collection $selectedAdditionalServices;

    public function __construct(array $data = [])
    {
        $this->load($data);

        $this->selectedServices = new Collection();

        $this->selectedRooms = new Collection();

        $this->additionalServices = new Collection();

        $this->selectedAdditionalServices = new Collection();
    }

    /**
     * @return array
     */
    public function toLivewire()
    {
        return get_object_vars($this);
    }

    protected function load(array $data): void
    {
        foreach ($data as $key => $val) {
            if (property_exists($this, $key)) {
                $this->{$key} = $val;
            }
        }
    }

    public function setProperty(string $key, $value): void
    {
        $this->{$key} = $value;
    }

    /**
     * @param $value
     * @return self
     */
    public static function fromLivewire($value = [])
    {
        $self = new self();
        foreach ($value as $key => $val) {
            if (property_exists($self, $key)) {
                $self->$key = $val;
            }
        }

        return $self;
    }
}
