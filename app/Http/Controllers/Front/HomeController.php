<?php

namespace App\Http\Controllers\Front;

use App\Course;
use App\Http\Controllers\Controller;
use App\SiteContent;
use App\Student;
use App\Test;
use App\Trainer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $banner = SiteContent::select('content')->where('name', 'banner')->first();
        $course_content = SiteContent::select('content')->where('name', 'courses')->first();
        $courses = Course::with('trainer', 'students', 'cat')->take(3)->get();
        $courses_count = Course::count();
        $student_count = Student::count();
        $trainers_count = Trainer::count();
        $tests = Test::all();

        return view('front.index', compact('courses', 'courses_count', 'student_count', 'trainers_count', 'tests', 'banner', 'course_content'));
    }
}
