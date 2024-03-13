<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile.show',compact('user'));
    }
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit',compact('user'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'email' => 'required|string|max:100',
            'current_password' => 'required|current_password',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::find($id);
        $user->email = $request->email;
        $user->password = bcrypt($request->new_password);
        $user->save();

        Session::flash('message','Credentials Updated Successfully');
        return redirect()->route('profile.edit')->withInput();
    }
}
