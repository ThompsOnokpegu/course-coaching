<?php
namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function create(Course $course){
        return view('topics.create', compact('course'));
    }

    public function store(Request $request, Course $course){
        $request->validate(['title' => 'required']);
        $course->topics()->create($request->only('title'));

        return redirect()->route('courses.show', $course)->with('success', 'Topic created successfully');
    }

    public function show(Topic $topic){
        return view('topics.show', compact('topic'));
    }

    public function edit(Topic $topic){
        return view('topics.edit', compact('topic'));
    }

    public function update(Request $request, Topic $topic){
        $request->validate(['title' => 'required']);
        $topic->update($request->only('title'));

        return redirect()->route('courses.show', $topic->course)->with('success', 'Topic updated successfully');
    }

    public function destroy(Topic $topic){
        $course = $topic->course;
        $topic->delete();
        return redirect()->route('courses.show', $course)->with('success', 'Topic deleted successfully');
    }
}
