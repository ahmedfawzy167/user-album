@extends('layouts.master')

@section('page-title')
 Profile
@endsection

@section('page-content')
<div class="card">
 <h4 class="card-header bg-primary text-white text-center"><i class="fa-solid fa-gear"></i> Edit Profile</h4>
  <div class="card-body">
   <form method="POST" action="{{route('profile.update',$user->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="email"><i class="fa-solid fa-envelope"></i> Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
        @error('email')
         <strong class="invalid-feedback" role="alert">{{$message}}</strong>
        @enderror
      </div>

     <div class="form-group">
      <label for="current_password"><i class="fa-solid fa-lock"></i> Current Password</label>
      <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password">
      @error('current_password')
        <strong class="invalid-feedback" role="alert">{{$message}}</strong>
      @enderror
    </div>

<div class="form-group">
  <label for="new_password"><i class="fas fa-unlock-alt"></i> New Password</label>
  <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password">
    @error('new_password')
      <strong class="invalid-feedback" role="alert">{{$message}}</strong>
    @enderror
</div>

<div class="form-group">
  <label for="new_password_confirmation"><i class="fas fa-clipboard-check"></i> Confirm Password</label>
  <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password_confirmation" name="new_password_confirmation">
  @error('new_password_confirmation')
    <strong class="invalid-feedback">{{ $message }}</strong>
  @enderror
</div>

<div class="text-center">
  <button type="submit" class="btn btn-primary btn-lg">Save Changes</button>
</div>

</form>

</div>
</div>

@include('layouts.messages')

@endsection
