<?php

namespace App\DTOs\Livewire;

use Illuminate\Support\Facades\Validator;
use Livewire\Wireable;
use App\Contracts\Livewire\CheckoutDataInterface;

class CheckoutDataDto implements Wireable, CheckoutDataInterface
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
    public ?int $state_id = null;

    /**
     * @var int|null
     */
    public ?int $service_id = null;


    public function __construct(array $data = [])
    {
        $this->load($data);
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }

    /**
     * @return array
     */
    public function toLivewire()
    {
        return $this->toArray();
    }

    protected function load(array $data): void
    {
        foreach ($data as $key => $val) {
            if (property_exists($this, $key)) {
                $this->{$key} = $val;
            }
        }
    }

    public function validate(): self
    {
        $validated = Validator::make($this->toArray(), [
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'phone'      => 'required|string',
            'state_id'   => 'required|integer',
            'city'       => 'nullable|string',
            'zip'        => 'nullable|string',
            'address'    => 'nullable|string',
            'apt_suite'  => 'nullable|string',
            'datetime'   => 'required|date',
            'comment'    => 'nullable|string',
        ])->validate();

        foreach ($validated as $key => $value) {
            $this->$key = $value;
        }

        return $this;
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
