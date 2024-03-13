@extends('layouts.master')

@section('page-title')
  All Users
@endsection

@section('page-content')
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <h1 class="text-center bg-primary text-light"><i class="fa-solid fa-list"></i> Users List</h1>
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="{{ route('users.show',$user->id) }}" class="btn btn-info">Show</a>
                                <a href="{{ route('users.edit',$user->id) }}" class="btn btn-success">Edit</a>
                                <form action="{{route('users.destroy' ,$user->id)}}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('delete')
                                     <button type="submit" class="btn btn-danger" style="display: inline-block">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <nav aria-label="...">
                        <ul class="pagination">
                          <li class="page-item {{ $users->previousPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $users->previousPageUrl() }}">Previous</a>
                          </li>
                          @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $users->currentPage() ? 'active' : '' }}" aria-current="page">
                              <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                          @endforeach
                          <li class="page-item {{ $users->nextPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $users->nextPageUrl() }}">Next</a>
                          </li>
                        </ul>
                      </nav>
                    </div>
            </div>
        </div>
    </div>


@include('layouts.messages')
@endsection

