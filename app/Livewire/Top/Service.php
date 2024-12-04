<?php

namespace App\Livewire\Top;

use App\Models\Service as ModelsService;
use Livewire\Component;

class Service extends Component
{
    public function render()
    {
        $services = ModelsService::with(['image'])->orderBy('created_at')->limit(4)->get();

        return view('main.section.livewire.top.service', [
            'items' => $services
        ]);
    }
}
