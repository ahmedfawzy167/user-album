<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Picture;
use App\Models\Album;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class AlbumController extends Controller
{

    public function index()
    {
        $albums = Album::all();
        return view('albums.index',compact('albums'));
    }
    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string'],
            'pictures' => ['required','array'],
            'pictures.*' => ['required','mimes:jpg,png,jpeg','max:2048'],
        ]);

        if($validator->fails())
        {
           return redirect()->back( )->withErrors($validator)->withInput();
        }

        $album = new Album();
        $album->name = $request->name;
        $album->save();

        foreach($request->file('pictures') as $imageFile) {
            $ext = $imageFile->getClientOriginalExtension();
            $fileName = Date("Y-m-d-h-i-s") . '.' . $ext;
            $location = "public/";
            $imageFile->storeAs($location,$fileName);

            $picture = new Picture();
            $picture->path = $fileName;
            $picture->picturable_type = 'App\Models\Album';
            $picture->picturable_id = $album->id;
            $picture->save();

        }
        Session::flash('message','Album Created Successfully');
        return redirect()->route('albums.index');
    }

    public function edit(Album $album)
    {
        return view('albums.edit', compact('album'));
    }

    public function update(Request $request, Album $album)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string'],
            'pictures' => ['nullable','array'],
            'pictures.*' => ['nullable','mimes:jpg,png,jpeg','max:2048'],
        ]);

        if($validator->fails())
        {
           return redirect()->back( )->withErrors($validator)->withInput();
        }

        $album->update([
            'name' => $request->input('name'),
        ]);
        foreach($request->file('pictures') as $imageFile) {
            $ext = $imageFile->getClientOriginalExtension();
            $fileName = Date("Y-m-d-h-i-s") . '.' . $ext;
            $location = "public/";
            $imageFile->storeAs($location,$fileName);

            $picture = new Picture();
            $picture->path = $fileName;
            $picture->picturable_type = 'App\Models\Album';
            $picture->picturable_id = $album->id;
            $picture->save();
        }
        Session::flash('message','Album Updated Successfully');
        return redirect()->route('albums.index');
    }

    public function show(Album $album)
    {
        $album = Album::findOrFail($album->id);
        return view('albums.show',compact('album'));
    }

    public function destroy(Album $album)
   {
     if($album->pictures->isNotEmpty()) {
        $albums = Album::where('id', '!=', $album->id)->get();
        return view('albums.confirm', compact('album', 'albums'));
     }

     $album->delete();
     return redirect()->route('albums.index');
   }

   public function deletePictures(Request $request, Album $album)
   {
       $action = $request->input('action');

       if ($action == 'delete') {
           $album->pictures()->delete();
       } elseif ($action == 'move') {
           $destinationAlbumId = $request->input('destination_album');
           $destinationAlbum = Album::findOrFail($destinationAlbumId);
           $pictures = $album->pictures()->get();
           foreach ($pictures as $picture) {
               $picture->picturable_id = $destinationAlbum->id;
               $picture->save();
           }
       }

       $album->delete();

       return redirect()->route('albums.index');
   }





}

