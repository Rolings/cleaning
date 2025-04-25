<?php

namespace App\Livewire;

use App\DTOs\Livewire\CheckoutDataDto;
use App\Models\State;
use App\Services\Checkout\CheckoutService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Checkout extends Component
{
    public CheckoutService $checkoutService;

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
        $this->checkoutService->loadData(new CheckoutDataDto(...$arguments));
    }

    /**
     * @param State $state
     * @return void
     */
    public function updatedDataStateId(State $state): void
    {
        $this->checkoutService->updateState($state);
    }

    public function updatedSelectedServicesId(): void
    {
        $this->updateSelectedFields();

    }

    public function updatedSelectedRoomId(): void
    {
        $this->updateSelectedFields();
    }

    public function updatedSelectedRoomCount(): void
    {
        $this->updateSelectedFields();

    }

    public function updatedSelectedAdditionalServicesId(): void
    {
        $this->updateSelectedFields();
    }

    private function updateSelectedFields()
    {
        $this->checkoutService->selectServices($this->selectedServicesId);

        $this->checkoutService->selectRooms($this->selectedRoomId);

        $this->checkoutService->selectRoomsCount($this->selectedRoomCount);

        $this->checkoutService->selectAdditionalServices($this->selectedAdditionalServicesId);

        $this->selectedRoomCount = $this->checkoutService->setDefaultSelectedRooms($this->selectedRoomId, $this->selectedRoomCount);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('main.section.livewire.checkout');
    }
}
