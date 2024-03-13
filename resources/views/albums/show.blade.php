@extends('layouts.master')

@section('page-title')
   Show Album
@endsection

@section('page-content')

<div class="d-flex justify-content-center align-items-center vh-60">
    <div class="card" style="width: 60rem;">
      <div class="card-body">
        <h2 class="card-title text-center bg-info text-white"><i class="fa-solid fa-eye"></i> Album Details</h2>
      </div>
      <ul class="list-group list-group-flush">
        <h4 class="list-group-item">Album Name: {{$album->name}}</h4>
        <h4 class="list-group-item">Album Picture:
        @foreach($album->pictures as $image)
            <img src="{{asset('storage/'.$image->path)}}" width="70px" class="mr-2">
        @endforeach</h4>
      </ul>
    </div>
  </div>
  <div class="text-center">
     <a href="{{route('albums.index')}}" class="btn btn-info mt-2">Back to List</a>
  </div>


@endsection
