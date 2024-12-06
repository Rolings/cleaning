<?php

namespace App\Livewire\Top;

use App\Models\User;
use Livewire\Component;

class Member extends Component
{
    public function render()
    {
        $employees = User::employees()->onlyTop()->onlyActive()->limit(4)->get();

        return view('main.section.livewire.top.member', [
            'items' => $employees
        ]);
    }
}
