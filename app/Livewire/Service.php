<?php

namespace App\Livewire;

use App\Models\Service as ModelsService;
use Livewire\Component;
use Livewire\WithPagination;

class Service extends Component
{
    use WithPagination;

    public function render()
    {
        $services = ModelsService::with('image')
            ->onlyActive()
            ->paginate(6);

        return view('main.section.livewire.service',[
            'services' => $services
        ]);
    }
}
