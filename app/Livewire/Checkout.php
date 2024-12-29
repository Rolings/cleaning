<?php

namespace App\Livewire;

use App\Models\AdditionalService;
use App\Models\Offer;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Support\Carbon;
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
    public $services = [];

    public $additionalServices = [];

    // Selected
    public array $includingSelectedServices = [];
    public array $additionalSelectedServices = [];

    public  $includingSelectedServiceList;
    public  $additionalSelectedServiceList;


    // Price
    public $totalPrice = 0;

    public $servicesPrice = 0;
    public $includingServicesPrice = 0;
    public $additionalServicesPrice = 0;
    public float $taxAmount = 0;
    public float $discountAmount = 0;
    private float $taxPercentage = 0;
    private float $discountPercentage = 0;

    // Date
    public string|null $date = null;

    public string|null $time = null;
    public string $dateTime = 'Choose service date...';

    public function __construct()
    {
        $this->taxPercentage = Setting::findByKey('tax_percentage')?->value ?? 0;

        $this->discountPercentage = Setting::findByKey('discount_percentage')?->value ?? 0;
    }

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

    /**
     * @param Offer $offer
     * @return void
     */
    public function updatedOfferId(Offer $offer)
    {
        $this->reloadService($offer);

        $this->calculationPrice();
    }

    /**
     * @return void
     */
    public function updatedIncludingSelectedServices(): void
    {
        $this->includingSelectedServiceList = Service::find($this->includingSelectedServices);

        $this->includingServicesPrice = $this->includingSelectedServiceList->sum('price');

        $this->calculationPrice();
    }

    /**
     * @return void
     */
    public function updatedAdditionalSelectedServices(): void
    {
        $this->additionalSelectedServiceList = AdditionalService::find($this->additionalSelectedServices);

        $this->additionalServicesPrice = $this->additionalSelectedServiceList->sum('price');

        $this->calculationPrice();
    }

    private function calculationPrice(): void
    {
        $sum = $this->servicesPrice + $this->includingServicesPrice + $this->additionalServicesPrice;

        $this->discountAmount = round($sum / 100 * $this->discountPercentage, 2);

        $this->taxAmount = round(($sum - $this->discountAmount) / 100 * $this->taxPercentage, 2);

        $this->totalPrice = round($sum + $this->taxAmount - $this->discountAmount, 2);
    }

    private function reloadService(Offer $offer)
    {
        $this->additionalSelectedServices = [];

        $this->offer = $offer->load(['services.additional']);

        $this->services = $this->offer->services;

        $this->servicesPrice = $this->services->sum('price');

        $this->additionalServices = $this->offer->services->pluck('additional')->flatten()->unique('id')->sortBy('name');
    }


    public function render()
    {
        $offers = Offer::onlyActive()->get();
        $services = Service::onlyActive()->get();

        return view('main.section.livewire.checkout', [
            'offers'   => $offers,
            'services' => $services,
        ]);
    }
}
