<?php
namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::all();
        return view('course.index', compact('courses'));
    }

    public function create(){
        return view('course.create');
    }

    public function store(Request $request){
        $request->validate(['title' => 'required', 'description' => 'nullable']);
        Course::create($request->only('title', 'description'));

        return redirect()->route('courses.index')->with('success', 'Course created successfully');
    }

    public function show(Course $course){
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course){
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course){
        $request->validate(['title' => 'required', 'description' => 'nullable']);
        $course->update($request->only('title', 'description'));

        return redirect()->route('courses.index')->with('success', 'Course updated successfully');
    }

    public function destroy(Course $course){
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully');
    }
}
