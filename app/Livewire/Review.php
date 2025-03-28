<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Review as ModelsReview;

class Review extends Component
{
    public function render()
    {
        $reviews = ModelsReview::with(['image'])->get();

        return view('main.section.livewire.review', [
            'items' => $reviews
        ]);
    }
}
