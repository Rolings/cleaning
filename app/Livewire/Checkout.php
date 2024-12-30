<?php

namespace App\Livewire;

use App\Models\AdditionalService;
use App\Models\Offer;
use App\Models\Service;
use App\Models\Setting;
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
    public string|null $date = null;

    public string|null $time = null;
    public string $dateTime = 'Choose service date...';

    public function __construct()
    {
        $this->services = new Collection();
        $this->additionalServices = new Collection();
        $this->selectedAdditionalServices = new Collection();


        $this->taxPercentage = Setting::findByKey('tax_percentage')?->value ?? 0;

        $this->discountPercentage = Setting::findByKey('discount_percentage')?->value ?? 0;
    }

    protected $listeners = ['updatedSelectServicesId'];

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

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['date', 'time'])) {
            $this->dateTime = Carbon::parse($this->date . '' . $this->time)->format('m/d/Y @ h:i: A');
        }
    }

    public function updatedOfferId(Offer $offer)
    {
        $this->reloadService($offer);

        $this->calculationPrice();
    }

    public function updatedSelectServicesId($payload)
    {
        $services = Service::find($payload['list']);

        $this->services = is_null($this->offer) ? $services : $this->offer->services->merge($services);

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

    private function calculateCostServices(): void
    {
        $this->costServices = $this->services->sum('price');
    }

    private function calculateCostAdditionalServices()
    {
        $this->costAdditionalServices = $this->selectedAdditionalServices->sum('price');
    }

    private function calculationPrice(): void
    {
        $this->calculateCostServices();

        $this->calculateCostAdditionalServices();

        $sum = $this->costServices + $this->costAdditionalServices;

        $this->discountAmount = round($sum / 100 * $this->discountPercentage, 2);

        $this->taxAmount = round(($sum - $this->discountAmount) / 100 * $this->taxPercentage, 2);

        $this->constTotal = round($sum + $this->taxAmount - $this->discountAmount, 2);
    }

    private function reloadService(Offer $offer)
    {
        $this->offer = $offer->load(['services.additional']);

        $this->selectedAdditionalServicesId = [];

        $this->services = $this->offer->services;

        $this->additionalServices = $this->offer->services->pluck('additional')->flatten()->unique('id')->sortBy('name');

        $this->calculateCostServices();
    }


    public function render()
    {
        $offers = Offer::onlyActive()->get();

        return view('main.section.livewire.checkout', [
            'offers' => $offers,
        ]);
    }
}
