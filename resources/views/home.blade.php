@extends('layouts.master')

@section('page-title')
Home Page
@endsection

@section('page-content')


 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Pictures
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$pictures}}</div>

                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-image fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="row">
     <!-- Pending Requests Card Example -->
     <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Users</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$users}}</div>

                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
     </div>

     <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            Albums</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$albums}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-folder-open fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
     </div>


    </div>


</div>

    <!-- Content Row -->
    <div class="row">

    <div class="col-xl-12 mb-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fa-regular fa-calendar-days"></i> Albums Today</h3>
            </div>

     <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Album Name</th>
                <th>Picture</th>
            </tr>
        </thead>
        <tbody>
            @foreach($albumsToday as $albums)
            <tr>
                <td>{{$albums->name}}</td>
                <td>
                @foreach($albums->pictures as $image)
                  <img src="{{asset('storage/'.$image->path)}}" width="70px" class="mr-2">
                @endforeach</td>
            </tr>
            @endforeach
        </tbody>
    </table>


 </div>
</div>
</div>

@endsection
