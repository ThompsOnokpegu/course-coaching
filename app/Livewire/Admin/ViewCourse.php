<?php

namespace App\Livewire\Admin;

use App\Models\Course;
use App\Models\Topic;
use Livewire\Component;

class ViewCourse extends Component
{
    public $course_id ='';
    public $title='';
    protected Course $course;

    public function render()
    {
        $topics = Topic::where('course_id',$this->course_id)->get();
        $course = Course::find($this->course_id);
       
        return view('livewire.admin.view-course',compact('topics','course'));
    }

    public function mount($id){
        $this->course_id = $id;
    }

    public function save(){

        $validated = $this->validate(['title' => 'required', 'course_id' => 'required']);
        Topic::create($validated);

        //$this->reset(); 
        $this->dispatch('topic-created');
        return redirect(route('course.view',$this->course_id));
        
    }
    
}
