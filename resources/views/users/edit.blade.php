@extends('layouts.master')

@section('page-title')
  Edit User
@endsection

@section('page-content')
<div class="card">
<div class="container card-body">
  <h1 class="text-center text-light bg-dark"><i class="fa-solid fa-pen-to-square"></i> Edit User</h1>
  <form action="{{route('users.update',$user->id)}}" method="post" class="row">
    @csrf
    @method('PUT')

    <div class="form-group col-md-12">
      <label for="name"><i class="fa-solid fa-file-signature"></i> User Name</label>
      <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror">
      @error('name')
         <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group col-md-6">
        <label for="email"><i class="fa-solid fa-envelope"></i> Email</label>
        <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror">
        @error('email')
         <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group col-md-6">
        <label for="password"><i class="fa-solid fa-lock"></i> Password</label>
        <input type="password" name="password" id="password" value="{{$user->password}}" class="form-control @error('password') is-invalid @enderror">
        @error('password')
         <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg">Update</button>
            <button type="reset" class="btn btn-secondary btn-lg">Reset</button>
        </div>

</form>


@endsection
