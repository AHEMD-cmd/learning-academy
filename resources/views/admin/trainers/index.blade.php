@extends('admin.layout')

@section('content')


<div class="d-flex justify-content-between mb-3">
    <h5>Trainers</h5>
    <a href="{{route('trainer.create')}}" class="btn btn-outline-primary btn-sm">Add new</a>
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
        <th scope="col">Spec</th>
        <th scope="col">Phone</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($trainers as $index=>$trainer)
        <tr>
          <th scope="row">{{1 + $index}}</th>
          <td><img src="{{asset('uploads/trainers/'. $trainer->img)}}" alt=""></td>
          <td>{{$trainer->name}}</td>
          <td>{{$trainer->spec}}</td>
          <td>
          @if($trainer->phone !== null)
          {{$trainer->phone}}
          @else
            not exist
          @endif
        </td>
          <td>
              <a href="{{route('trainer.edit', $trainer->id)}}" class="btn btn-outline-info btn-sm">Edit</a>
              <a href="{{route('trainer.delete', $trainer->id)}}"class="btn btn-outline-danger btn-sm">Delete</a>
          </td>

        </tr>

        @endforeach

    </tbody>
  </table>

@endsection
