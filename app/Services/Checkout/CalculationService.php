<?php

namespace App\Services\Checkout;

use App\Models\Offer;
use App\Models\Setting;
use Illuminate\Support\Collection;

class CalculationService
{

    private Offer $offer;

    private float $tax_percentage = 0;
    private float $tax_amount = 0;

    private float $discount_percentage = 0;

    private float $discount_amount = 0;

    public Collection $includingServices;

    public Collection $selectedServices;

    public Collection $additionalServices;

    public Collection $selectedAdditionalServices;

    /**
     * @var float|int
     */
    public float $includingServicesPrice = 0;

    /**
     * @var float|int
     */
    public float $selectedServicesPrice = 0;

    /**
     * @var float|int
     */
    public float $additionalServicesPrice = 0;

    public function __construct()
    {
        $this->tax_percentage = Setting::findByKey('tax_percentage')?->value ?? 0;

        $this->discount_percentage = Setting::findByKey('discount_percentage')?->value ?? 0;
    }

    /**
     * @param Offer $offer
     * @return $this
     */
    public function setOffer(Offer $offer): self
    {
        $this->offer = $offer;

        $this->offer->load('services.additional');

        $this->setIncludingServices();

        $this->setAdditionalServices();

        $this->calculateIncludingServicesPrice();

        return $this;
    }

    /**
     * @param float $tax
     * @return $this
     *
     */
    public function setTax(float $tax): self
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * @param float $discount
     * @return $this
     *
     */
    public function setDiscount(float $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function setIncludingServices(?Collection $services = null): self
    {
        $this->includingServices = is_null($services)
            ? $this->offer->services
            : $services;

        $this->includingServicesPrice = $this->includingServices->sum('price');

        return $this;
    }

    public function setAdditionalServices(?Collection $services = null): self
    {
        $this->additionalServices = is_null($services)
            ? $this->offer->services->pluck('additional')->flatten()->unique('id')->sortBy('name')
            : $services;

        $this->additionalServicesPrice = $this->additionalServices->sum('price');

        return $this;
    }

    public function setSelectedServices(Collection $services): self
    {
        $this->selectedServices = $services;

        return $this;

    }

    public function setSelectedAdditionalServices(Collection $services): self
    {
        $this->selectedAdditionalServices = $services;

        $this->calculateAdditionalServicesPrice();

        return $this;
    }

    private function calculateIncludingServicesPrice(): self
    {
        $this->includingServicesPrice = $this->includingServices->sum('price');

        return $this;
    }

    private function calculateSelectedServicesPrice(): self
    {
        $this->selectedServicesPrice = $this->selectedServices->sum('price');

        return $this;
    }

    private function calculateAdditionalServicesPrice(): self
    {
        $this->additionalServicesPrice = $this->selectedAdditionalServices->sum('price');

        return $this;
    }

    public function getTaxAmount(): float
    {
        return $this->tax_amount;
    }

    public function getDiscountAmount(): float
    {
        return $this->discount_amount;
    }


    public function calculateTotalPrice(): float
    {
        $sum = $this->includingServicesPrice + $this->selectedServicesPrice + $this->additionalServicesPrice;

        $this->discount_amount = round($sum / 100 * $this->discount_percentage, 2);

        $this->tax_amount = round(($sum - $this->discount_amount) / 100 * $this->tax_percentage, 2);

        return round($sum + $this->tax_amount - $this->discount_amount, 2);
    }
}
