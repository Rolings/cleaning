<?php

namespace App\Livewire;

use App\DTOs\Livewire\CheckoutDataDto;
use App\Services\Checkout\CheckoutService;
use App\Traits\CheckoutTrait;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Attributes\On;

class Checkout extends Component
{
    use CheckoutTrait;

    public CheckoutService $checkoutService;

    /**
     * @var string
     */
    public ?string $order_at = null;

    /**
     * @var array
     */
    public $selectedServicesId;

    /**
     * @var array
     */
    public array $selectedRoomId = [];

    /**
     * @var array
     */
    public array $selectedRoomCount = [];

    /**
     * @var array
     */
    public array $selectedAdditionalServicesId = [];

    public function __construct()
    {
        $this->checkoutService = new CheckoutService();
    }

    public function mount(...$arguments): void
    {
        $this->checkoutService->loadData(new CheckoutDataDto(...$arguments));

        $this->initServices();
    }

    protected function initServices(): void
    {
        $this->services = $this->checkoutService->services;
        $this->selectedServices = $this->checkoutService->selectedServices;

        $this->rooms = $this->checkoutService->rooms;
        $this->selectedRooms = $this->checkoutService->selectedRooms;
        $this->selectedRoomsCount = $this->checkoutService->selectedRoomsCount;

        $this->additionalServices = $this->checkoutService->additionalServices;
        $this->selectedAdditionalServices = $this->checkoutService->selectedAdditionalServices;
    }

    // Services
    public function updatedSelectedServicesId(): void
    {
        $this->clearServiceSelected();

        $this
            ->checkoutService
            ->setServices([$this->selectedServicesId],
                function (
                    $selectedServices,
                    $rooms,
                    $selectedRooms
                ) {
                    $this->selectedServices = $selectedServices;
                    $this->rooms = $rooms;
                    $this->selectedRooms = $selectedRooms;

                })
            ->getDefaultServiceRoom(
                function (
                    $defaultSelectRooms
                ) {
                    $this->selectedRoomId = $defaultSelectRooms;
                })
            ->setRooms($this->selectedRoomId,
                function (
                    $selectedRooms,
                    $additionalServices
                ) {
                    $this->selectedRooms = $selectedRooms;
                    $this->additionalServices = $additionalServices;
                })
            ->setDefaultSelectedRooms($this->selectedRoomId, $this->selectedRoomCount,
                function (
                    $selectedRoomCount
                ) {
                    $this->selectedRoomCount = $selectedRoomCount;
                })
            ->setRoomsCount($this->selectedRoomCount,
                function (
                    $selectedRoomCount
                ) {
                    $this->selectedRoomsCount = $selectedRoomCount;
                });
    }

    public function updatedSelectedRoomId(): void
    {
        $this
            ->checkoutService
            ->setServices([$this->selectedServicesId],
                function (
                    $selectedServices,
                    $rooms,
                    $selectedRooms
                ) {
                    $this->selectedServices = $selectedServices;
                    $this->rooms = $rooms;
                    $this->selectedRooms = $selectedRooms;

                })
            ->getDefaultServiceRoom(
                function (
                    $defaultSelectRooms
                ) {
                    $this->selectedRoomId = $defaultSelectRooms;
                })
            ->setRooms($this->selectedRoomId,
                function (
                    $selectedRooms,
                    $additionalServices
                ) {
                    $this->selectedRooms = $selectedRooms;
                    $this->additionalServices = $additionalServices;
                })
            ->setDefaultSelectedRooms($this->selectedRoomId, $this->selectedRoomCount,
                function (
                    $selectedRoomCount
                ) {
                    $this->selectedRoomCount = $selectedRoomCount;
                })
            ->setRoomsCount($this->selectedRoomCount,
                function (
                    $selectedRoomCount
                ) {
                    $this->selectedRoomsCount = $selectedRoomCount;
                });

    }

    public function updatedSelectedRoomCount(): void
    {
        $this
            ->checkoutService
            ->setServices([$this->selectedServicesId],
                function (
                    $selectedServices,
                    $rooms,
                    $selectedRooms
                ) {
                    $this->selectedServices = $selectedServices;
                    $this->rooms = $rooms;
                    $this->selectedRooms = $selectedRooms;

                })
            ->getDefaultServiceRoom(
                function (
                    $defaultSelectRooms
                ) {
                    $this->selectedRoomId = $defaultSelectRooms;
                })
            ->setRooms($this->selectedRoomId,
                function (
                    $selectedRooms,
                    $additionalServices
                ) {
                    $this->selectedRooms = $selectedRooms;
                    $this->additionalServices = $additionalServices;
                })
            ->setDefaultSelectedRooms($this->selectedRoomId, $this->selectedRoomCount,
                function (
                    $selectedRoomCount
                ) {
                    $this->selectedRoomCount = $selectedRoomCount;
                })
            ->setRoomsCount($this->selectedRoomCount,
                function (
                    $selectedRoomCount
                ) {
                    $this->selectedRoomsCount = $selectedRoomCount;
                });
    }

    public function updatedSelectedAdditionalServicesId(): void
    {
        $this
            ->checkoutService
            ->setServices([$this->selectedServicesId],
                function (
                    $selectedServices,
                    $rooms,
                    $selectedRooms
                ) {
                    $this->selectedServices = $selectedServices;
                    $this->rooms = $rooms;
                    $this->selectedRooms = $selectedRooms;

                })
            ->getDefaultServiceRoom(
                function (
                    $defaultSelectRooms
                ) {
                    $this->selectedRoomId = $defaultSelectRooms;
                })
            ->setRooms($this->selectedRoomId,
                function (
                    $selectedRooms,
                    $additionalServices
                ) {
                    $this->selectedRooms = $selectedRooms;
                    $this->additionalServices = $additionalServices;
                })
            ->setDefaultSelectedRooms($this->selectedRoomId, $this->selectedRoomCount,
                function (
                    $selectedRoomCount
                ) {
                    $this->selectedRoomCount = $selectedRoomCount;
                })
            ->setRoomsCount($this->selectedRoomCount,
                function (
                    $selectedRoomCount
                ) {
                    $this->selectedRoomsCount = $selectedRoomCount;
                })
            ->setAdditionalServices($this->selectedAdditionalServicesId, function ($selectedAdditionalServices) {
                $this->selectedAdditionalServices = $selectedAdditionalServices;
            });

    }

    // Order date
    public function updatedSelectedOrderAt(): void
    {
        $this->checkoutService->setDatetime($this->order_at, function ($datetime) {
            $this->datetime = $datetime;
        });
    }

    #[On('set-date.updated')]
    public function setSelectedOrderAt($date): void
    {
        $this->order_at = $date;

        $this->checkoutService->setDatetime($this->order_at, function ($datetime) {
            $this->datetime = $datetime;
        });
    }

    public function openCalendar(): void
    {
        $this->dispatch('set-default-date', date: $this->datetime);

        $this->skipRender();
    }

    // Contact information

    public function updatedFirstName(): void
    {
        $this->checkoutService->setName($this->first_name, $this->last_name, function (string $fullName) {

        });

    }

    public function updatedLastName(string $lastName): void
    {
        $this->checkoutService->setName($this->first_name, $this->last_name, function (string $fullName) {

        });

    }

    public function updatedEmail(): void
    {
        $this->checkoutService->setEmail($this->email);
    }

    public function updatedPhone(): void
    {
        $this->checkoutService->setPhone($this->phone);
    }

    public function updatedZip(): void
    {
        $this->checkoutService->setZip($this->zip);

        $this->checkoutService->buildAddressByZip(function (
            ?int    $stateId,
            ?string $city,
            ?string $address,
            ?string $aptSuite,
        ) {
            $this->state_id = $stateId;
            $this->city = $city;
            $this->address = $address;
            $this->apt_suite = $aptSuite;
        });
    }

    public function updatedAddress(): void
    {
        $this->checkoutService->setAddress($this->address);

        $this->skipRender();
    }

    public function updatedAptSuite(): void
    {
        $this->checkoutService->setAptSuite($this->apt_suite);

        $this->skipRender();
    }


    private function clearServiceSelected(): void
    {
        $this->selectedRoomId = [];
        $this->selectedRoomCount = [];
        $this->selectedAdditionalServicesId = [];
    }


    public function submit()
    {

        $validated = $this->validate([
            'service_id'              => ['required', 'integer', 'exists:services,id'],

            'order_at'   => ['required', 'date'],
            'first_name' => ['required', 'string', 'max:100'],
            'last_name'  => ['sometimes', 'nullable', 'string'],
            'phone'      => ['required', 'string'],
            'email'      => ['sometimes', 'nullable', 'email'],
            'zip'        => ['required', 'string', 'min:5', 'max:15'],
            'address'    => ['required', 'string', 'max:180'],
            'apt_suite'  => ['sometimes', 'nullable', 'string', 'max:10'],
            'comment'    => ['sometimes', 'nullable', 'string', 'max:255'],
            /*






                        'state_id'                => ['required', 'integer', 'exists:states,id'],

                        'selected_rooms_count_id' => ['required', 'nullable', 'array'],
                        'additional_services_id'  => ['required', 'integer', 'exists:additional_services,id'],
                        ,*/
        ]);
        dd($validated);

        return response()->json($validated);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('main.section.livewire.checkout');
    }
}
