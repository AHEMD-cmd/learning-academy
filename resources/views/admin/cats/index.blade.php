@extends('admin.layout')

@section('content')


<div class="d-flex justify-content-between mb-3">
    <h5>Categories</h5>
    <a href="{{route('cat.create')}}" class="btn btn-outline-primary btn-sm">Add new</a>
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
        <th scope="col">Name</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($cats as $index=>$cat)
        <tr>
          <th scope="row">{{1 + $index}}</th>
          <td>{{$cat->name}}</td>
          <td>
              <a href="{{route('cat.edit', $cat->id)}}" class="btn btn-outline-info btn-sm">Edit</a>
              <a href="{{route('cat.delete', $cat->id)}}"class="btn btn-outline-danger btn-sm">Delete</a>
          </td>

        </tr>

        @endforeach

    </tbody>
  </table>

@endsection
