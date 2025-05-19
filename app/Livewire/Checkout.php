<?php

namespace App\Livewire;

use App\DTOs\Livewire\CheckoutDataDto;
use App\Models\State;
use App\Services\Checkout\CheckoutService;
use App\Traits\CheckoutTrait;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Http;

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
        // $this->selectedOrderAt = now()->toDateString();
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

        $this->city = $this->checkoutService->city;

        $this->zip = $this->checkoutService->zip;

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

    public function openCalendar(): void
    {
        $this->dispatch('set-default-date', date: $this->selectedOrderAt);
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

    public function updatedSelectedStateId(): void
    {
        $this->setService();
    }

    public function updatedCity(): void
    {
        $this->setService();
    }

    public function updatedZip(): void
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

        $this->city = $this->checkoutService->city;

        $this->zip = $this->checkoutService->zip;

        $this->checkoutService->setServices([$this->selectedServicesId]);

        $this->checkoutService->setRooms($this->selectedRoomId);

        $this->selectedRoomCount = $this->checkoutService
            ->setDefaultSelectedRooms($this->selectedRoomId, $this->selectedRoomCount);

        $this->checkoutService->setRoomsCount($this->selectedRoomCount);

        $this->checkoutService->setAdditionalServices($this->selectedAdditionalServicesId);
    }

    public function submit(): void
    {
        dd(request()->all());
 /*       $validated = $this->validate([
            'first_name'             => ['required', 'string', 'max:100'],
            'last_name'              => ['sometimes', 'nullable', 'string'],
            'phone'                  => ['required', 'string'],
            'email'                  => ['sometimes', 'nullable', 'email'],
            'address'                => ['required', 'string', 'max:100'],
            'apt_suite'              => ['sometimes', 'nullable', 'string', 'max:100'],
            'city'                   => ['required', 'string', 'max:100'],
            'state_id'               => ['required', 'string', 'exists:states,id'],
            'zip'                    => ['required', 'string', 'max:100'],
            'selected_order_at'               => ['required'],
            'services_id'            => ['required', 'nullable', 'string',],
            'count_rooms'            => ['required', 'nullable', 'array',],
            'additional_services_id' => ['required', 'nullable', 'string',],
            'comment'                => ['sometimes', 'nullable', 'string'],
        ]);*/

       // Http::post(route('api.checkout.submit'), $validated);

        dd($validated);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('main.section.livewire.checkout');
    }
}
