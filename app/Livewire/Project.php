<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project as ProjectModel;

class Project extends Component
{
    public function render()
    {
        $projects = ProjectModel::with(['gallery'])->get();

        return view('main.section.livewire.projects',[
            'projects' => $projects
        ]);
    }
}
