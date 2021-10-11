@extends('admin.layout')

@section('content')


<div class="d-flex justify-content-between mb-3">
    <h5>Courses / Edit / {{$course->name}}</h5>
    <a href="{{route('course.index')}}" class="btn btn-outline-primary btn-sm">Back</a>
</div>


@if(Session::has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form action="{{route('course.update', $course->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$course->name}}">
        @error('name')
        <div class="text-danger">{{$message}}</div>
        @enderror
     </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Price</label>
      <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$course->price}}">
        @error('price')
        <div class="text-danger">{{$message}}</div>
        @enderror
     </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Small dscription</label>
      <input type="text" name="small_desc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$course->small_desc}}">
        @error('small_desc')
        <div class="text-danger">{{$message}}</div>
        @enderror
     </div>

     <div class="mb-3">
       <label for="exampleInputEmail1" class="form-label">Description</label>
       <textarea type="text" name="desc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">{{$course->desc}}</textarea>
         @error('desc')
         <div class="text-danger">{{$message}}</div>
         @enderror
      </div>


    <div>
        <img src="{{asset('uploads/courses/'. $course->img)}}" alt="">
    </div>

    <div class="mb-3 form-group>
      <label for="exampleInputEmail1" class="form-label">Image</label>
      <input type="file" name="img" class="form-control-file" id="exampleInputEmail1" aria-describedby="emailHelp">
        @error('img')
        <div class="text-danger">{{$message}}</div>
        @enderror
     </div>

     <div class="mb-3 form-group">
        <select class="form-control" name="cat_id">
          <option value="">Categories</option>
          @foreach ($cats as $cat)
          <option value="{{$cat->id}}" {{$cat->id == $course->cat_id? 'selected': ''}}>{{$cat->name}}</option>
          @endforeach
        </select>
    </div>

    <div class="mb-3 form-group">

        <select class="form-control" name="trainer_id">
          <option value="">Trainers</option>
          @foreach ($trainers as $trainer)
          <option value="{{$trainer->id}}" {{$trainer->id == $course->cat_id? 'selected': ''}}>{{$trainer->name}}</option>
          @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-outline-primary btn-sm mb-5">update</button>
  </form>

@endsection
