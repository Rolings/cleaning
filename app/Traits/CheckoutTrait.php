<?php

namespace App\Traits;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

trait CheckoutTrait
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
    public ?string $state = null;

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
    public Carbon|null $datetime = null;

    /**
     * @var string|null
     */
    public ?string $comment = null;

    /**
     * @var int|null
     */
    public ?int $service_id = null;

    /**
     * @var Collection|null
     */
    public ?Collection $rooms_id = null;

    /**
     * @var Collection|null
     */
    public ?Collection $selected_rooms_count = null;

    /**
     * @var Collection|null
     */
    public ?Collection $additional_services_id = null;

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
    public Collection $rooms;

}
