<?php
namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function create(Topic $topic){
        return view('lessons.create', compact('topic'));
    }

    public function store(Request $request, Topic $topic){
        $request->validate([
            'title' => 'required',
            'content' => 'nullable',
            'video_url' => 'nullable|url'
        ]);
        $topic->lessons()->create($request->only('title', 'content', 'video_url'));

        return redirect()->route('topics.show', $topic)->with('success', 'Lesson created successfully');
    }

    public function show(Lesson $lesson){
        return view('lessons.show', compact('lesson'));
    }

    public function edit(Lesson $lesson){
        return view('lessons.edit', compact('lesson'));
    }

    public function update(Request $request, Lesson $lesson){
        $request->validate([
            'title' => 'required',
            'content' => 'nullable',
            'video_url' => 'nullable|url'
        ]);
        $lesson->update($request->only('title', 'content', 'video_url'));

        return redirect()->route('topics.show', $lesson->topic)->with('success', 'Lesson updated successfully');
    }

    public function destroy(Lesson $lesson){
        $topic = $lesson->topic;
        $lesson->delete();
        return redirect()->route('topics.show', $topic)->with('success', 'Lesson deleted successfully');
    }
}
