<?php

namespace App\Livewire\Admin;

use App\Models\Lesson;
use App\Models\Topic;
use Livewire\Component;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class UpdateLesson extends Component
{
    public $lesson_id;
    public $topic_id;
    public $title;
    public $content;
    public $video_url;

    public function render()
    {
        $topics = Topic::all();

        return view('livewire.admin.update-lesson',compact('topics'));
    }

    public function mount($id){

        $this->lesson_id = $id;
        $lesson = Lesson::find($id);
        $this->topic_id = $lesson->topic_id;
        $this->title = $lesson->title;
        $this->video_url = $lesson->video_url;
        $this->content = $lesson->content;
    }

    public function save(){
        
        $validated = $this->validate(['topic_id'=>'required','title'=>'required','content'=>'nullable','video_url'=>'required']);

        $lesson = Lesson::find($this->lesson_id);
        
        $lesson->topic_id = $validated['topic_id'];
        $lesson->title = $validated['title'];
        $lesson->content = $validated['content'];
        $lesson->video_url = $validated['video_url'];

        $lesson->save();

        return redirect(route('topic.view',$lesson->topic_id));

    }
}
