<?php

namespace App\Traits;

use Illuminate\Support\Carbon;

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

}
