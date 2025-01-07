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
    public $city = null;

    public $zip = null;


    public $description = null;


    // Current offer
    public Offer|null $offer = null;


    // List
    public Collection $services;

    public Collection $additionalServices;

    // Selected
    public Collection $selectedAdditionalServices;

    public array $selectedAdditionalServicesId = [];

    // Price
    public $constTotal = 0;
    public $costServices = 0;
    public $costAdditionalServices = 0;
    public float $taxAmount = 0;
    public float $discountAmount = 0;
    public float $taxPercentage = 0;
    public float $discountPercentage = 0;

    // Date
    public string|null $datetime = null;
    public string|null $datetimeFormat = null;

    public function __construct()
    {
        $this->services = new Collection();
        $this->additionalServices = new Collection();
        $this->selectedAdditionalServices = new Collection();

        $this->taxPercentage = Setting::findByKey('tax_percentage')?->value ?? 0;

        $this->discountPercentage = Setting::findByKey('discount_percentage')?->value ?? 0;
    }

    protected $listeners = ['updatedSelectServicesId'];

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
    }

    /**
     * @param $propertyName
     * @return void
     */
    public function updatedDatetime(string $datetime): void
    {
        $this->datetimeFormat = Carbon::parse($datetime)->format('d/m/Y @ h:i A');
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
    }

    /**
     * @param $payload
     * @return void
     */
    public function updatedSelectServicesId($payload): void
    {
        $services = Service::find($payload['list']);

        $this->setServices($services);

        $this->additionalServices = $this->services->pluck('additional')->flatten()->unique('id')->sortBy('name');

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

        $this->services = is_null($this->offer) ? $services : $this->offer->services->merge($services);

    }

    /**
     * @return void
     */
    private function calculateCostServices(): void
    {
        $this->costServices = $this->services->sum('price');
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

        $this->constTotal = round($sum + $this->taxAmount - $this->discountAmount, 2);
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

        $this->additionalServices = $this->services->pluck('additional')->flatten()->unique('id')->sortBy('name');

        $this->calculateCostServices();
    }

    private function setStateAddress(State $state): void
    {
        $this->city = $state->capital;

        $this->zip = $state->zip;
    }

    /**
     * @return View
     */
    public function render(): View
    {
        $offers = Offer::onlyActive()->get();
        $states = State::onlyActive()->get();

        return view('main.section.livewire.checkout', [
            'offers' => $offers,
            'states' => $states,
        ]);
    }
}
