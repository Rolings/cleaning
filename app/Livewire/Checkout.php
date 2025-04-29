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

    /**
     * @var string
     */
    public ?string $selectOrderAt = null;

    /**
     * @var int
     */
    public ?int $selectStateId = null;

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

    public function updatedSelectOrderAt(): void
    {
        $this->updateFields();
    }

    /**
     * @param State $state
     * @return void
     */
    public function updatedSelectStateId(): void
    {
        $this->updateFields();
    }

    public function updatedSelectedServicesId(): void
    {
        $this->cleanFields();

        $this->checkoutService->selectDatetime($this->selectOrderAt);

        $this->checkoutService->selectState($this->selectStateId);

        $this->checkoutService->selectServices([$this->selectedServicesId]);

        $this->selectedRoomId = $this->checkoutService->getDefaultServiceRoom();

        $this->checkoutService->selectRooms($this->selectedRoomId);

        $this->selectedRoomCount = $this->checkoutService
            ->setDefaultSelectedRooms($this->selectedRoomId, $this->selectedRoomCount);

        $this->checkoutService->selectRoomsCount($this->selectedRoomCount);

        $this->checkoutService->selectAdditionalServices($this->selectedAdditionalServicesId);

    }

    public function updatedSelectedRoomId(): void
    {
        $this->updateFields();
    }

    public function updatedSelectedRoomCount(): void
    {
        $this->updateFields();

    }

    public function updatedSelectedAdditionalServicesId(): void
    {
        $this->updateFields();
    }

    private function cleanFields(): void
    {
        $this->selectedRoomId = [];
        $this->selectedRoomCount = [];
        $this->selectedAdditionalServicesId = [];
    }

    private function updateFields()
    {
        $this->checkoutService->selectDatetime($this->selectOrderAt);

        $this->checkoutService->selectState($this->selectStateId);

        $this->checkoutService->selectServices([$this->selectedServicesId]);

        $this->checkoutService->selectRooms($this->selectedRoomId);

        $this->selectedRoomCount = $this->checkoutService
            ->setDefaultSelectedRooms($this->selectedRoomId, $this->selectedRoomCount);

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
