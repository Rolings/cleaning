<?php

namespace App\Livewire\Top;

use App\Models\Project as ProjectModel;
use Livewire\Component;

class Project extends Component
{
    public function render()
    {
        $projects = ProjectModel::with(['gallery'])->limit(6)->get();

        return view('main.section.livewire.top.project', [
            'items' => $projects,
        ]);
    }
}
