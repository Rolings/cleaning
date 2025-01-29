<?php

namespace App\Livewire;

use App\Models\AdditionalService;
use App\Models\Offer;
use App\Models\Service;
use App\Models\Setting;
use App\Models\State;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Livewire\Component;

class Checkout extends Component
{
    // Contact
    public $first_name = null;

    public $last_name = null;

    public $phone = null;

    public $offer_id = null;

    public $state_id = null;

    public $address = null;

    public $apt_suite = null;

    public $city = null;

    public $zip = null;

    public $comment = null;

    // Current offer
    public Offer|null $offer = null;


    // List

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
     * Collection services of current offer
     *
     * @var Collection
     */
    public Collection $offerServices;

    /**
     * Collection additional services of all selected services
     *
     * @var Collection
     */
    public Collection $additionalServices;

    /**
     * @var Collection
     */
    public Collection $selectedServices;

    /**
     * @var Collection
     */
    public Collection $selectedAdditionalServices;


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
    public string|null $datetime = null;
    public string|null $datetimeFormat = null;

    /**
     * @var bool
     */
    public bool $validation = false;

    public function __construct()
    {
        $this->offerServices = new Collection();

        $this->selectedServices = new Collection();

        $this->additionalServices = new Collection();

        $this->selectedAdditionalServices = new Collection();

        $this->datetime = now()->format('m/d/Y h:i A');

        $this->datetimeFormat = now()->format('d/m/Y @ h:i A');

        $this->taxPercentage = Setting::findByKey('tax_percentage')?->value ?? 0;

        $this->discountPercentage = Setting::findByKey('discount_percentage')?->value ?? 0;
    }

    /**
     * @param ...$arguments
     * @return void
     */
    public function mount(...$arguments): void
    {
        if (isset($arguments[0]) && count($arguments[0])) {
            foreach ($arguments[0] as $property => $value) {
                if (property_exists($this, $property)) {
                    $this->{$property} = $value;
                }
            }
        }

        if (!is_null($this->offer_id)) {

            $this->reloadService(Offer::find($this->offer_id));

            $this->calculationPrice();
        }

        $this->states = State::onlyActive()->get();

        $this->offers = Offer::onlyActive()->get();

        $this->services = Service::onlyActive()->get();

        $this->state_id = $this->states->filter(fn($state) => $state->default)?->first()?->id;

        $this->setStateAddress($this->states->filter(fn($state) => $state->default)?->first());
    }

    public function updated()
    {
        $this->checkValidation();
    }

    public function checkValidation(): void
    {
        $this->validation = $this->totalCost > 0
            && !empty($this->first_name)
            && strlen($this->phone) >= 17
            && !empty($this->address)
            && !empty($this->apt_suite);
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
        $this->reloadService($offer);

        $this->calculationPrice();

        $this->checkValidation();

    }

    /**
     * @param $payload
     * @return void
     */
    public function updatedSelectedServicesId(): void
    {
        $services = Service::find($this->selectedServicesId);

        $this->setServices($services);

        $this->additionalServices = $this->selectedServices->pluck('additional')->flatten()->unique('id')->sortBy('name');

        $this->calculationPrice();
    }

    /**
     * @return void
     */
    public function updatedSelectedAdditionalServicesId(): void
    {
        $this->selectedAdditionalServices = AdditionalService::find($this->selectedAdditionalServicesId);

        $this->calculationPrice();
    }

    /**
     * @param Collection|null $services
     * @return void
     */
    private function setServices(?Collection $services = null): void
    {
        $services = $services ?? collect();

        if (!is_null($this->offer)) {
            $this->offerServices = $this->offer->services;

            $this->selectedServicesId = $this->offer->services->merge($services)->pluck('id')->toArray();

            $this->selectedServices = $this->offer->services->merge($services);

        } else {
            $this->selectedServices = $services;

            $this->selectedServicesId = $services->pluck('id')->toArray();
        }
    }

    /**
     * @return void
     */
    private function calculateCostServices(): void
    {
        $this->costServices = $this->selectedServices->sum('price');
    }

    /**
     * @return void
     */
    private function calculateCostAdditionalServices(): void
    {
        $this->costAdditionalServices = $this->selectedAdditionalServices->sum('price');
    }

    /**
     * @return void
     */
    private function calculationPrice(): void
    {
        $this->calculateCostServices();

        $this->calculateCostAdditionalServices();

        $sum = $this->costServices + $this->costAdditionalServices;

        $this->discountAmount = round($sum / 100 * $this->discountPercentage, 2);

        $this->taxAmount = round(($sum - $this->discountAmount) / 100 * $this->taxPercentage, 2);

        $this->totalCost = round($sum + $this->taxAmount - $this->discountAmount, 2);
    }

    /**
     * @param Offer|null $offer
     * @return void
     */
    private function reloadService(?Offer $offer)
    {
        $this->offer = $offer->load(['services.additional']);

        $this->selectedAdditionalServicesId = [];

        $this->setServices();

        $this->additionalServices = $this->selectedServices->pluck('additional')->flatten()->unique('id')->sortBy('name');

        $this->calculateCostServices();
    }

    private function setStateAddress(State|null $state): void
    {
        if (is_null($state)) {
            return;
        }

        $this->city = $state->capital;

        $this->zip = $state->zip;
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('main.section.livewire.checkout');
    }
}
