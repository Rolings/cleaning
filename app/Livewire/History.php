<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\History as HistoryModel;

class History extends Component
{
    public function render()
    {
        $history = HistoryModel::orderByDesc('event_date_at')->get();

        return view('main.about.section.story',[
            'history' => $history,
        ]);
    }
}
