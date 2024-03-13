@extends('layouts.master')

@section('page-title')
Edit Album
@endsection

@section('page-content')
<div class="card">
 <div class="card-body container">
   <h1 class="text-center bg-dark text-white"><i class="fa-solid fa-pen-to-square"></i> Edit Existing Album</h1>
   <form action="{{ route('albums.update',['album' => $album->id]) }}" method="POST" class="row" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group col-md-12">
      <label for="name"><i class="fa-solid fa-file-signature"></i> Album Name</label>
      <input type="text" name="name" id="name" value="{{$album->name}}" class="form-control @error('name') is-invalid @enderror">
      @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

      <div class="form-group col-md-12">
        <label for="pictures"><i class="fa-solid fa-image"></i> Picture</label>
        <input type="file" name="pictures[]" multiple id="pictures" class="form-control @error('pictures') is-invalid @enderror">
        @error('pictures')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>


        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg">Update</button>
            <button type="reset" class="btn btn-secondary btn-lg">Reset</button>
        </div>

</form>
</div>
</div>

@endsection
