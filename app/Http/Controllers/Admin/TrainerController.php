<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Trainer;
use Image;

class TrainerController extends Controller
{
    public function index(){
        $trainers = Trainer::latest()->get();
        return view('admin.trainers.index', compact('trainers'));
    }
    public function create(){
        return view('admin.trainers.create');
    }

    public function store(Request $request){

        $data = $request->validate([
            'name' => 'required|string|max:191',
            'phone' => 'nullable|string|max:191',
            'spec' =>'required|string|max:191',
            'img' => 'image|required',
        ]);
        $new_name = $data['img']->hashName();
        Image::make($data['img'])->resize(50, 50)->save(public_path('uploads/trainers/'.$new_name));
        $data['img'] = $new_name;

        Trainer::create($data);

        session()->flash('success', 'success !');
        return back();
    }

    public function edit($id){
        $trainer = Trainer::findOrFail($id);
        return view('admin.trainers.edit', compact('trainer'));
    }


    public function update(Request $request, $id){
        $trainer = Trainer::findOrFail($id);

        $data =      $request->validate([
            'name' => 'required|string|max:191',
            'phone' => 'nullable|string|max:191',
            'spec' =>'required|string|max:191',
            'img' => 'image|nullable',
        ]);
        $old_name = $trainer->img;
        if($request->hasFile('img')){

            Storage::disk('uploads')->delete('trainers/'.$old_name);
            $new_name = $data['img']->hashName();
            Image::make($data['img'])->resize(50, 50)->save(public_path('uploads/trainers/'.$new_name));
            $data['img'] = $new_name;

        }

        $trainer->update($data);

        session()->flash('success', 'success !');
        return back();
    }



    public function delete($id){
        $trainer =  Trainer::find($id);
        $trainer->delete();

        $img = $trainer->img;
        if($img){
            Storage::disk('uploads')->delete('trainers/'.$img);
        }
        session()->flash('success', 'success !');
        return back();
    }
}
