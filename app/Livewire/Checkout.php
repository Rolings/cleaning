<?php

namespace App\Livewire;

use App\DataTransferObjects\Livewire\CheckoutDataDto;
use App\Models\State;
use App\Services\Checkout\CheckoutService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Checkout extends Component
{
    public CheckoutService $checkoutService;

    public $data;

    public array $selectedServicesId = [];
    public array $selectedRoomId = [];

    public array $selectedRoomCount = [];

    public array $selectedAdditionalServicesId = [];

    public function __construct()
    {
        $this->checkoutService = new CheckoutService();
    }

    public function mount(...$arguments): void
    {
        $this->data = new CheckoutDataDto(...$arguments);
    }

    /**
     * @param State $state
     * @return void
     */
    public function updatedDataStateId(State $state): void
    {
        $this->checkoutService->updateState($state);

        $this->data->setProperty('city', $this->checkoutService->city);

        $this->data->setProperty('zip', $this->checkoutService->zip);
    }

    public function updatedSelectedServicesId(): void
    {
        $this->checkoutService->selectServices($this->selectedServicesId);
    }

    public function updatedSelectedRoomId(): void
    {
        $this->checkoutService->selectServices($this->selectedServicesId);

        $this->checkoutService->selectRooms($this->selectedRoomId);
    }

    public function updatedSelectedRoomCount(): void
    {
        $this->checkoutService->selectServices($this->selectedServicesId);

        $this->checkoutService->selectRooms($this->selectedRoomId);

        $this->checkoutService->selectRoomsCount($this->selectedRoomCount);

    }

    public function updatedSelectedAdditionalServicesId(): void
    {
        $this->checkoutService->selectServices($this->selectedServicesId);

        $this->checkoutService->selectRooms($this->selectedRoomId);

        $this->checkoutService->selectRoomsCount($this->selectedRoomCount);

        $this->checkoutService->selectAdditionalServices($this->selectedAdditionalServicesId);
    }


    /**
     * @return View
     */
    public function render(): View
    {
        return view('main.section.livewire.checkout');
    }
}
