@extends('layouts.master')

@section('page-title')
   Search User
@endsection

@section('page-content')

<div class="d-flex justify-content-center align-items-center vh-60">
    <div class="card" style="width: 60rem;">
      <div class="card-body">
        <h2 class="card-title text-center bg-info text-white"><i class="fa-solid fa-eye"></i> Search Results</h2>
      </div>
      <ul class="list-group list-group-flush">
        <h4 class="list-group-item">User Name: {{$user->name}}</h4>
        <h4 class="list-group-item">Email: {{$user->email}}</h4>
      </ul>

    </div>
  </div>


@endsection
