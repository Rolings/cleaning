<?php

namespace App\Livewire;

use App\Models\AdditionalService;
use App\Models\Offer;
use App\Models\Service;
use Illuminate\Support\Carbon;
use Livewire\Component;
use App\Services\Checkout\CalculationService;

class CheckoutCalculator extends Component
{
    // Contact
    public $first_name = null;

    public $last_name = null;

    public $phone = null;

    public $description = null;

    // Current offer
    public ?Offer $offer = null;

    // List
    public $offer_id = null;
    public $includingServices = [];
    public $additionalServices = [];

    // Selected
    public $includingSelectedServices = [];
    public $additionalSelectedServices = [];

    // Price
    public $totalPrice = 0;
    public $includingServicesPrice = 0;
    public $additionalServicesPrice = 0;
    public float $taxAmount = 0;
    public float $discountAmount = 0;

    // Date
    public string|null $date = null;

    public string|null $time = null;
    public string $dateTimeCombination = 'Choose service date...';

    private CalculationService $service;

    public function __construct()
    {
        $this->service = new CalculationService();
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
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['date', 'time'])) {
            $this->dateTimeCombination = Carbon::parse($this->date . '' . $this->time)->format('m/d/Y @ h:i: A');
        }
    }

    public function updatedOfferId(Offer $offer)
    {
        $offer->load(['services.additional']);

        $this->additionalSelectedServices = [];

        $this->offer = $offer;
    }

    public function updatedAdditionalSelectedServices()
    {
        $this->service->setSelectedAdditionalServices(AdditionalService::find($this->additionalSelectedServices));
    }

    protected function executeCalculation(?Offer $offer = null): void
    {
        if (!is_null($offer)) {

            if (!$this->offer instanceof Offer) {
                $this->offer = $offer;
            }

            $this->service->setOffer($offer);

            $this->includingServices = $this->service->includingServices;

            $this->additionalServices = $this->service->additionalServices;
        }

        $this->includingServicesPrice = $this->service->includingServicesPrice;

        $this->additionalServicesPrice = $this->service->additionalServicesPrice;

        $this->totalPrice = $this->service->calculateTotalPrice();

        $this->taxAmount = $this->service->getTaxAmount();

        $this->discountAmount = $this->service->getDiscountAmount();
    }

    public function render()
    {

        $this->executeCalculation(!is_null($this->offer_id) ? Offer::find($this->offer_id) : $this->offer);

        $offers = Offer::onlyActive()->get();
        $services = Service::onlyActive()->get();

        $data = [
            'offers'   => $offers,
            'services' => $services,
        ];


        return view('main.section.livewire.checkout-calculator', $data);
    }
}
