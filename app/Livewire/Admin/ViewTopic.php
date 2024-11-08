<?php

namespace App\Livewire\Admin;

use App\Models\Lesson;
use App\Models\Topic;
use Livewire\Component;

class ViewTopic extends Component
{
    public $topic_id = '';
    public $title ='';
    public $content ='';
    public $video_url='';

    public function render()
    {
        $topic = Topic::find($this->topic_id);
        $lessons = Lesson::where('topic_id',$this->topic_id)->get();
        return view('livewire.admin.view-topic',compact('topic','lessons'));
    }

    public function mount($id){
        $this->topic_id = $id;
    }

    public function save(){
        $validated = $this->validate(['title' => 'required', 'content'=>'nullable','video_url'=>'required','topic_id' => 'required']);
        Lesson::create($validated);

        //$this->reset(); 
        $this->dispatch('lesson-saved');
        return redirect(route('topic.view',$this->topic_id));
    }
}
