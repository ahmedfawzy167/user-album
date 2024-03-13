@extends('layouts.master')

@section('page-title')
   Confirm Album
@endsection

@section('page-content')

<div class="d-flex justify-content-center align-items-center vh-60">
    <div class="card" style="width: 60rem;">
      <div class="card-body">
        <h2 class="card-title text-center bg-info text-white"><i class="fa-solid fa-eye"></i> Confirm Album Deletion</h2>
        <p>Are you sure you want to delete the album: {{ $album->name }}?</p>
      </div>
      <ul class="list-group list-group-flush">
        @if($albums->isNotEmpty())
        <p>This album contains pictures. Please select one of the following options:</p>
        <form method="POST" action="{{ route('albums.delete-pictures', ['album' => $album->id]) }}">
            @csrf
            @method('DELETE')

            <input type="radio" name="action" value="delete" checked>
            <label for="delete">Delete all pictures</label>
            <br>
            <input type="radio" name="action" value="move">
            <label for="move">Move pictures to another album:</label>
            <select name="destination_album" class="form-select">
                @foreach ($albums as $otherAlbum)
                    <option value="{{ $otherAlbum->id }}">{{ $otherAlbum->name }}</option>
                @endforeach
            </select>
            <br>
            <button type="submit" class="btn btn-info w-100">Confirm</button>
        </form>
    @else
        <p>This album contains no pictures. It will be deleted.</p>
        <form method="POST" action="{{ route('albums.destroy', ['album' => $album->id]) }}">
            @csrf
            @method('DELETE')

            <button type="submit">Confirm</button>
        </form>
    @endif
      </ul>
    </div>
  </div>

@endsection
