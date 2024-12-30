<?php

namespace App\Livewire;

use App\Models\AdditionalService;
use App\Models\Offer;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Support\Carbon;
use Livewire\Component;

class CheckoutModal extends Component
{
    // Selected
    public array $servicesId = [];

    /**
     * @return void
     */
    public function updatedServicesId(): void
    {
       $this->dispatch('updatedSelectServicesId', ['list' => $this->servicesId]);
    }

    public function render()
    {
        $services = Service::onlyActive()->get();

        return view('main.section.livewire.checkout-modal', [
            'services' => $services,
        ]);
    }
}
