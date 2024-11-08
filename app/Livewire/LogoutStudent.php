<?php

namespace App\Livewire;

use App\Livewire\Actions\Logout;
use Livewire\Component;

class LogoutStudent extends Component
{
    public function render()
    {
        return view('livewire.logout-student');
    }
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}
