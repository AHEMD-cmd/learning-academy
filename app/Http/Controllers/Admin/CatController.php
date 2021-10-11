<?php

namespace App\Http\Controllers\Admin;

use App\Cat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function index(){
        $cats = Cat::all();
        return view('admin.cats.index', compact('cats'));
    }
    public function create(){
        return view('admin.cats.create');
    }

    public function store(Request $request){

        $data = $request->validate([
            'name' =>'required|string|max:191'
        ]);
        Cat::create($data);

        session()->flash('success', 'success !');
        return back();
    }

    public function edit($id){
        $cat = Cat::findOrFail($id);
        return view('admin.cats.edit', compact('cat'));
    }


    public function update(Request $request, $id){
        $cat = Cat::findOrFail($id);

        $data =      $request->validate([
            'name' =>'required|string|max:191'
        ]);

        $cat->update($data);

        session()->flash('success', 'success !');
        return back();
    }

    public function delete($id){
        Cat::find($id)->delete();

        session()->flash('success', 'success !');
        return back();
    }
}
