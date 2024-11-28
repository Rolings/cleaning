<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project as ProjectModel;

class Project extends Component
{
    public function render()
    {
        $projects = ProjectModel::with(['mainPhoto','gallery'])->get();

        return view('main.projects.section.projects',[
            'projects' => $projects
        ]);
    }
}
