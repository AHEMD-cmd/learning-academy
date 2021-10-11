<?php

namespace App\Http\Controllers\front;

use App\Cat;
use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function cat($id){
        $cat = Cat::findOrFail($id);
        $courses = Course::where('cat_id', $id)->paginate(3);
        return view('front.courses.cat', compact('cat','courses'));
    }

    public function show($c_id, $id){

        $course = Course::findOrFail($id);
        return view('front.courses.show', compact('course'));
    }

    
}
