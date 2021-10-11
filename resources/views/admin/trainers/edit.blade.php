@extends('admin.layout')

@section('content')


<div class="d-flex justify-content-between mb-3">
    <h5>Categories / Edit / {{$trainer->name}}</h5>
    <a href="{{route('trainer.index')}}" class="btn btn-outline-primary btn-sm">Back</a>
</div>


@if(Session::has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form action="{{route('trainer.update', $trainer->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$trainer->name}}">
        @error('name')
        <div class="text-danger">{{$message}}</div>
        @enderror
     </div>
     <div>
         <img src="{{asset('uploads/trainers/'. $trainer->img)}}" alt="">
     </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Image</label>
      <input type="file" name="img" class="form-control-file" id="exampleInputEmail1" aria-describedby="emailHelp">
        @error('image')
        <div class="text-danger">{{$message}}</div>
        @enderror
     </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Phone</label>
      <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$trainer->phone}}">
        @error('phone')
        <div class="text-danger">{{$message}}</div>
        @enderror
     </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Spec</label>
      <input type="text" name="spec" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$trainer->spec}}">
        @error('spec')
        <div class="text-danger">{{$message}}</div>
        @enderror
     </div>


    <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
  </form>

@endsection
