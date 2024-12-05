<?php

namespace App\Livewire\Top;

use Livewire\Component;
use App\Models\Question as ModelsQuestion;

class Question extends Component
{
    public function render()
    {
        $questions = ModelsQuestion::onlyTop()
            ->onlyActive()
            ->orderBy('created_at')
            ->limit(5)
            ->get();

        return view('main.section.livewire.top.question', [
            'items' => $questions
        ]);
    }
}
