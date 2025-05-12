<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
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
        $this->dispatch('set-date.updated', date: $this->selectedDate);
    }

    /**
     * @param string|null $date
     * @return void
     */
    #[On('open-calendar-modal')]
    public function setDate(string $date = null)
    {
        $this->selectedDate = $date;
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('main.section.livewire.checkout-modal');
    }
}
