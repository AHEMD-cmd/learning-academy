<?php

namespace App\Http\Controllers\Admin;

use App\Cat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use App\Trainer;
use Illuminate\Support\Facades\Storage;

use Image;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }
    public function create(){
        $cats = Cat::all();
        $trainers = Trainer::all();
        return view('admin.courses.create', compact('cats', 'trainers'));
    }

    public function store(Request $request){

        $data = $request->validate([
            'name' => 'required|string|max:191',
            'small_desc' => 'nullable|string|max:191',
            'desc' =>'required|string|max:191',
            'img' => 'image|required',
            'price' => 'required',
            'cat_id' => 'required|exists:cats,id',
            'trainer_id' => 'required|exists:trainers,id',
        ]);
        $new_name = $data['img']->hashName();
        Image::make($data['img'])->resize(970, 520)->save(public_path('uploads/courses/'.$new_name));
        $data['img'] = $new_name;

        Course::create($data);

        session()->flash('success', 'success !');
        return back();
    }

    public function edit($id){
        $course = Course::findOrFail($id);
        $cats = Cat::all();
        $trainers = Trainer::all();
        return view('admin.courses.edit', compact('trainers', 'course', 'cats'));
    }


    public function update(Request $request, $id){
        $course = Course::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:191',
            'small_desc' => 'nullable|string|max:191',
            'desc' =>'required|string|max:191',
            'img' => 'image|required',
            'price' => 'required',
            'cat_id' => 'required|exists:cats,id',
            'trainer_id' => 'required|exists:trainers,id',
        ]);
        $old_name = $course->img;
        if($request->hasFile('img')){

            Storage::disk('uploads')->delete('courses/'.$old_name);
            $new_name = $data['img']->hashName();
            Image::make($data['img'])->resize(50, 50)->save(public_path('uploads/trainers/'.$new_name));
            $data['img'] = $new_name;

        }

        $course->update($data);

        session()->flash('success', 'success !');
        return back();
    }



    public function delete($id){
        $course =  Course::find($id);
        $course->delete();

        $img = $course->img;
        if($img){
            Storage::disk('uploads')->delete('courses/'.$img);
        }
        session()->flash('success', 'success !');
        return back();
    }
}
