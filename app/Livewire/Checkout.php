<?php

namespace App\Livewire;

use App\DTOs\Livewire\CheckoutDataDto;
use App\Models\State;
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
    public ?string $selectedOrderAt = null;

    /**
     * @var int
     */
    public ?int $selectedStateId = null;

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
    }

    public function updatedSelectedServicesId(): void
    {
        $this->cleanFields();

        $this->checkoutService->setFirstName($this->first_name);

        $this->checkoutService->setLastName($this->last_name);

        $this->checkoutService->setEmail($this->email);

        $this->checkoutService->setPhone($this->phone);

        $this->checkoutService->setAddress($this->address);

        $this->checkoutService->setAptSuite($this->apt_suite);

        $this->checkoutService->setDatetime($this->selectedOrderAt);

        $this->checkoutService->setState($this->selectedStateId);

        $this->checkoutService->setServices([$this->selectedServicesId]);

        $this->selectedRoomId = $this->checkoutService->getDefaultServiceRoom();

        $this->checkoutService->setRooms($this->selectedRoomId);

        $this->selectedRoomCount = $this->checkoutService
            ->setDefaultSelectedRooms($this->selectedRoomId, $this->selectedRoomCount);

        $this->checkoutService->setRoomsCount($this->selectedRoomCount);

        $this->checkoutService->setAdditionalServices($this->selectedAdditionalServicesId);

    }

    public function updatedSelectedRoomId(): void
    {
        $this->setService();
    }

    public function updatedSelectedRoomCount(): void
    {
        $this->setService();
    }

    public function updatedSelectedAdditionalServicesId(): void
    {
        $this->setService();
    }

    public function updatedSelectedOrderAt(): void
    {
        $this->setService();

        $this->dispatch('open-calendar-modal', date: $this->selectedOrderAt);
    }

    #[On('set-date.updated')]
    public function setSelectedOrderAt($date): void
    {
        $this->selectedOrderAt = $date;

        $this->setService();
    }

    public function updatedFirstName(): void
    {
        $this->setService();
    }

    public function updatedLastName(string $lastName): void
    {
        $this->setService();
    }

    public function updatedEmail(): void
    {
        $this->setService();
    }

    public function updatedPhone(): void
    {
        $this->setService();
    }

    /**
     * @param State $state
     * @return void
     */
    public function updatedSelectedStateId(): void
    {
        $this->setService();
    }

    public function updatedAddress(): void
    {

        $this->setService();
    }

    public function updatedAptSuite(): void
    {

        $this->setService();
    }


    private function cleanFields(): void
    {
        $this->selectedRoomId = [];
        $this->selectedRoomCount = [];
        $this->selectedAdditionalServicesId = [];
    }


    private function setService(): void
    {
        $this->checkoutService->setFirstName($this->first_name);

        $this->checkoutService->setLastName($this->last_name);

        $this->checkoutService->setEmail($this->email);

        $this->checkoutService->setPhone($this->phone);

        $this->checkoutService->setAddress($this->address);

        $this->checkoutService->setAptSuite($this->apt_suite);

        $this->checkoutService->setDatetime($this->selectedOrderAt);

        $this->checkoutService->setState($this->selectedStateId);

        $this->checkoutService->setServices([$this->selectedServicesId]);

        $this->checkoutService->setRooms($this->selectedRoomId);

        $this->selectedRoomCount = $this->checkoutService
            ->setDefaultSelectedRooms($this->selectedRoomId, $this->selectedRoomCount);

        $this->checkoutService->setRoomsCount($this->selectedRoomCount);

        $this->checkoutService->setAdditionalServices($this->selectedAdditionalServicesId);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('main.section.livewire.checkout');
    }
}
