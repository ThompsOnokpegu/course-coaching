<?php
namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Topic;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $topics = Topic::all();
        return view('course.index', compact('topics'));
    }

    public function lesson(Request $request){
        $topics = Topic::all();
        $lesson = Lesson::find($request->lesson_id);
        if($lesson){
            return view('course.lesson', compact('topics','lesson'));
        }
        return redirect(route('course.index',compact('topics')));
    }
}
