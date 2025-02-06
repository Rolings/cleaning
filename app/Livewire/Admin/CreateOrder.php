<?php

namespace App\Livewire\Admin;

use App\Models\AdditionalService;
use App\Models\Offer;
use App\Models\Service;
use App\Models\Setting;
use App\Models\State;
use App\Models\Order;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Livewire\Component;

class CreateOrder extends Component
{
    // Contact
    public $first_name = null;

    public $last_name = null;

    public $phone = null;

    public $email = null;

    public $offer_id = null;

    public $state_id = null;

    public $address = null;

    public $apt_suite = null;

    public $city = null;

    public $zip = null;

    public $comment = null;

    public Order|null $order = null;

    public Offer|null $offer = null;

    /**
     *  Collection all states
     *
     * @var Collection
     */
    public Collection $states;

    /**
     * Collection all offers
     *
     * @var Collection
     */
    public Collection $offers;

    /**
     * Collection all services
     *
     * @var Collection
     */
    public Collection $services;

    /**
     * @var Collection
     */
    public Collection $selectedServices;

    /**
     * @var Collection
     */
    public Collection $selectedAdditionalServices;

    /**
     * Collection additional services of all selected services
     *
     * @var Collection
     */
    public Collection $additionalServices;

    // Selected
    /**
     * List of selected services
     *
     * @var array
     */
    public array $selectedServicesId = [];

    /**
     * List of selected additional services
     * @var array
     */
    public array $selectedAdditionalServicesId = [];

    // Price
    public $totalCost = 0;
    public $costServices = 0;
    public $costAdditionalServices = 0;
    public float $taxAmount = 0;
    public float $discountAmount = 0;
    public float $taxPercentage = 0;
    public float $discountPercentage = 0;

    // Date
    public string|null $order_at = null;
    public string|null $datetimeFormat = null;

    /**
     * @param ...$arguments
     * @return void
     */
    public function mount(): void
    {
        $this->configInit();

        $this->setOffer(Offer::onlyActive()->customerOffer()->first());

        $this->loadServices();
    }

    /**
     * @param State $state
     * @return void
     */
    public function updatedStateId(State $state): void
    {
        $this->setStateAddress($state);
    }

    /**
     * @param Offer $offer
     * @return void
     */
    public function updatedOfferId(Offer $offer): void
    {
        $this->setOffer($offer);

        $this->cleanSelectedServices();

        if ($this->isCurrentOffer()) {
            $this->loadOrderServices();
        }

        if (!$this->isCurrentOffer()) {
            $this->selectedServices = $this->offer->services;
        }

        $this->loadServices();
    }

    /**
     * @param $payload
     * @return void
     */
    public function updatedSelectedServicesId(): void
    {
        $this->selectedServices = Service::find($this->selectedServicesId);

        $this->loadServices();
    }

    /**
     * @return void
     */
    public function updatedSelectedAdditionalServicesId(): void
    {
        $this->selectedAdditionalServices = AdditionalService::find($this->selectedAdditionalServicesId);

        $this->loadServices();
    }

    /**
     * @param $propertyName
     * @return void
     */
    public function updatedDatetime(string $datetime): void
    {
        $this->datetimeFormat = Carbon::parse($datetime)->format('m/d/Y @ h:i A');
    }

    /**
     * @return void
     */
    private function configInit(): void
    {
        $this->selectedServices = new Collection();

        $this->additionalServices = new Collection();

        $this->selectedAdditionalServices = new Collection();

        $this->order_at = now()->format('m/d/Y h:i A');

        $this->datetimeFormat = now()->format('d/m/Y @ h:i A');

        $this->taxPercentage = Setting::findByKey('tax_percentage')?->value ?? 0;

        $this->discountPercentage = Setting::findByKey('discount_percentage')?->value ?? 0;

        $this->states = State::onlyActive()->get();

        $this->offers = Offer::onlyActive()->get();

        $this->services = Service::onlyActive()->get();
    }

    /**
     * @return void
     */
    private function orderDataInit(): void
    {
        $this->first_name = $this->order->first_name;

        $this->last_name = $this->order->last_name;

        $this->phone = $this->order->phone;

        $this->email = $this->order->email;

        $this->address = $this->order->address;

        $this->apt_suite = $this->order->apt_suite;

        $this->state_id = $this->order->state->id;

        $this->order_at = $this->order->order_at;

        $this->setStateAddress($this->order->state);
    }

    /**
     * @return bool
     */
    private function isCurrentOffer(): bool
    {
        if (!$this->order instanceof Offer) {
            return false;
        }

        return $this->offer->id === $this->order->offer->id;
    }

    /**
     * @param Order $order
     * @return void
     */
    private function setOrder(Order $order): void
    {
        $this->order = $order->load(['offer', 'state', 'entities.entity']);
    }

    /**
     * @param Offer $offer
     * @return void
     */
    private function setOffer(Offer $offer): void
    {
        $this->offer = $offer->load(['services.additional']);
    }

    /**
     * Function clear selected services and additional services lists
     *
     * @return void
     */
    private function cleanSelectedServices(): void
    {
        $this->selectedServices = collect();
        $this->selectedAdditionalServices = collect();

        $this->selectedServicesId = [];
        $this->selectedAdditionalServicesId = [];
    }

    /**
     * @return void
     */
    private function loadOrderServices(): void
    {
        if ($this->order instanceof Order) {
            [$this->selectedServices, $this->selectedAdditionalServices] = $this->order
                ->entities
                ->map(fn($items) => $items->entity)
                ->partition(fn($items) => $items instanceof Service);
        }
    }

    /**
     * @return void
     */
    private function loadServices()
    {
        $this->selectedServicesId = $this->selectedServices
            ->pluck('id')
            ->toArray();

        $this->selectedAdditionalServicesId = $this->selectedAdditionalServices
            ->pluck('id')
            ->toArray();

        $this->additionalServices = $this->selectedServices->values()
            ->pluck('additional')
            ->flatten()
            ->unique('id')
            ->sortBy('name');

        $this->calculateCost();
    }

    /**
     * @return void
     */
    private function calculateCost(): void
    {
        $this->costServices = $this->selectedServices->sum('price');

        $this->costAdditionalServices = $this->selectedAdditionalServices->sum('price');

        $sum = $this->costServices + $this->costAdditionalServices;

        $this->discountAmount = round($sum / 100 * $this->discountPercentage, 2);

        $this->taxAmount = round(($sum - $this->discountAmount) / 100 * $this->taxPercentage, 2);

        $this->totalCost = round($sum + $this->taxAmount - $this->discountAmount, 2);
    }

    /**
     * @param State|null $state
     * @return void
     */
    private function setStateAddress(State|null $state): void
    {
        if (is_null($state)) return;

        $this->city = $state->capital;

        $this->zip = $state->zip;
    }

    public function render()
    {
        return view('admin.section.livewire.create-order');
    }
}
