<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;
use App\Models\Service as ModelsService;
use Livewire\Attributes\Computed;

class Service extends Component
{
    public function render()
    {
        $services = ModelsService::orderBy('created_at')->paginate(8);

        return view('main.section.livewire.service',[
            'services' => $services
        ]);
    }
}
