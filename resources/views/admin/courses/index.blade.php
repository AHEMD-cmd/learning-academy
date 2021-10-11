@extends('admin.layout')

@section('content')


<div class="d-flex justify-content-between mb-3">
    <h5>Courses</h5>
    <a href="{{route('course.create')}}" class="btn btn-outline-primary btn-sm">Add new</a>
</div>

@if(Session::has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">price</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($courses as $index=>$course)
        <tr>
          <th scope="row">{{1 + $index}}</th>
          <td><img src="{{asset('uploads/courses/'. $course->img)}}" height="150" width="150"></td>
          <td>{{$course->name}}</td>
          <td>${{$course->price}}</td>

          <td>
              <a href="{{route('course.edit', $course->id)}}" class="btn btn-outline-info btn-sm">Edit</a>
              <a href="{{route('course.delete', $course->id)}}"class="btn btn-outline-danger btn-sm">Delete</a>
          </td>

        </tr>

        @endforeach

    </tbody>
  </table>

@endsection
