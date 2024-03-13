@extends('layouts.master')

@section('page-title')
  All Albums
@endsection

@section('page-content')
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <h1 class="text-center bg-primary text-light"><i class="fa-solid fa-list"></i> Albums List</h1>
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Album Name</th>
                            <th>Picture</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($albums as $album)
                        <tr>
                            <td>{{$album->id}}</td>
                            <td>{{$album->name}}</td>
                            <td>
                            @foreach($album->pictures as $image)
                                <img src="{{asset('storage/'.$image->path)}}" width="70px" class="mr-2">
                            @endforeach
                             </td>
                            <td>
                                <a href="{{ route('albums.show',$album->id) }}" class="btn btn-info">Show</a>
                                <a href="{{ route('albums.edit',$album->id) }}" class="btn btn-success">Edit</a>
                                <form action="{{route('albums.destroy' ,$album->id)}}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('delete')
                                     <button type="submit" class="btn btn-danger" style="display: inline-block">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>


@include('layouts.messages')
@endsection

