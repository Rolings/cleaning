<?php

namespace App\Livewire;

use App\Models\Question as ModelsQuestion;
use Livewire\Component;

class Question extends Component
{
    public function render()
    {
        $questions = ModelsQuestion::onlyTop()->onlyActive()->orderBy('created_at')->get();

        return view('main.section.livewire.question', [
            'items' => $questions
        ]);
    }
}
