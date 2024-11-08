<?php

namespace App\Livewire\Student;

use Livewire\Component;

class TakeCourse extends Component
{
    public $lesson;

    public function render()
    {
        $lesson = $this->lesson;
        return view('livewire.student.take-course',compact('lesson'));
    }

    public function mount($lesson){
        $this->lesson = $lesson;
    }
}
