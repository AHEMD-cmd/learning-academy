@extends('admin.layout')

@section('content')


<div class="d-flex justify-content-between mb-3">
    <h5>Categories/Add new</h5>
    <a href="{{route('cat.index')}}" class="btn btn-outline-primary btn-sm">Back</a>
</div>


@if(Session::has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form action="{{route('cat.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        @error('name')
        <div class="text-danger">{{$message}}</div>
        @enderror
     </div>


    <button type="submit" class="btn btn-outline-primary btn-sm">Save</button>
  </form>

@endsection
