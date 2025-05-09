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
    /**
     * @var string
     */
    public ?string $selectedDate = null;

    /**
     * @var array
     */
    public array $blockedDate = [];

    /**
     * @return void
     */
    public function updatedSelectedDate(): void
    {
        $this->dispatch('selected-date.updated', date: $this->selectedDate);
    }

    public function render()
    {
        return view('main.section.livewire.checkout-modal',[

        ]);
    }
}
