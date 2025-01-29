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

class EditOrder extends Component
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

    public Order $order;

    // Current offer
    public Offer|null $offer = null;


    public Collection $offerServices;

    public Collection $offerAdditionalServices;

    public Collection $selectedOfferServices;

    public Collection $selectedOfferAdditionalServices;


    public function __construct()
    {

    }

    /**
     * @param ...$arguments
     * @return void
     */
    public function mount(Order $order): void
    {
        $order->load('offer');

        $this->order = $order;

        $this->reloadService($order->offer);
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

    }


    /**
     * @param Offer|null $offer
     * @return void
     */
    private function reloadService(?Offer $offer)
    {
        $this->offer = $offer->load(['services.additional']);

        [$this->selectedOfferServices, $this->selectedOfferAdditionalServices] = $this->order
            ->entities
            ->map(fn($items) => $items->entity)
            ->partition(fn($items) => $items instanceof Service);


        if ($this->order->offer_id === $this->offer->id) {

            $this->selectedOfferServices->load('additional');

            $this->offerAdditionalServices = $this->offer->services->pluck('additional')->flatten()->unique('id')->sortBy('name');
        }

    }

    private function setStateAddress(State $state): void
    {
        $this->city = $state->capital;

        $this->zip = $state->zip;
    }

    public function render()
    {
        $states = State::onlyActive()->get();
        $offers = Offer::onlyActive()->get();
        $allServices = Service::onlyActive()->get();
        $allAdditionalServices = AdditionalService::onlyActive()->get();

        return view('admin.section.livewire.edit-order', [
            'states'                => $states,
            'offers'                => $offers,
            'allServices'           => $allServices,
         //   'allAdditionalServices' => $allAdditionalServices,
        ]);
    }
}
