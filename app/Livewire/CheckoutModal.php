<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class CheckoutModal extends Component
{
    /**
     * @var string
     */
    public ?string $defaultDate = null;

    /**
     * @var array
     */
    public array $blockedDate = [];

    /**
     * @return void
     */
    public function updatedDefaultDate(): void
    {
        $this->dispatch('set-date.updated', date: $this->defaultDate);
    }

    /**
     * @param string|null $date
     * @return void
     */
    #[On('set-default-date')]
    public function setDefaultDate(?string $date = null)
    {
        $this->defaultDate = is_null($date) ?? Carbon::parse($date)->format('Y-m-d');
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('main.section.livewire.checkout-modal');
    }
}
