<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\User;
use App\Models\Album;
use App\Models\Picture;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
class HomeController extends Controller
{
    public function index()
    {
        $users = User::count();
        $pictures = Picture::count();
        $albums = Album::count();

        $today = Carbon::today();
        $albumsToday = Album::whereDate('created_at', $today)->get();

        return view('home',compact('users','albums','pictures','albumsToday'));
    }

    public function search(Request $request)
    {
        $term = $request->input('term');
        $user = User::where("name","LIKE","%$term%")->first();
        return view('search',compact('user'));
    }
}
