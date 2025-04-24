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

   // public $data;

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
        $this->checkoutService->selectServices($this->selectedServicesId);
    }

    public function updatedSelectedRoomId(): void
    {
        $this->checkoutService->selectServices($this->selectedServicesId);

        $this->checkoutService->selectRooms($this->selectedRoomId);

        $this->selectedRoomCount = $this->mergeTestArrays($this->selectedRoomId,$this->selectedRoomCount);
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

    function mergeTestArrays(array $baseIds, array $overrideValues): array
    {
        foreach ($overrideValues as $key => $value) {
            if (is_int($key) && is_int($value) && !array_key_exists($value, $overrideValues)) {
                $overrideValues[$value] = 1;
                unset($overrideValues[$key]);
            }
        }

        $mergedArray = [];

        foreach ($baseIds as $id) {
            $mergedArray[$id] = $overrideValues[$id] ?? 1;
        }

        return $mergedArray;
    }


    /**
     * @return View
     */
    public function render(): View
    {
        return view('main.section.livewire.checkout');
    }
}
