<?php

namespace App\Livewire\Admin;

use App\Models\Course;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CreateCourse extends Component
{
    public $title = '';
 
    public $description = '';

    public function render()
    {
        $courses = Course::all();
        return view('livewire.admin.create-course',compact('courses'));
    }

    public function save(){
        $validated = $this->validate(['title' => 'required', 'description' => 'required']);
        Course::create($validated);
        $this->reset(); 
        $this->dispatch('course-created');

        //return redirect()->route('courses.index')->with('success', 'Course created successfully');
    }
}
