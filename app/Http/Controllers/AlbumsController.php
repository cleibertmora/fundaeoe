<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Album;

class AlbumsController extends Controller
{
    public function index()
    {
        $albums = Album::orderBy('id','DESC')->paginate(6);
        return view('galeria.index')->with('albums', $albums);
    }

    public function create()
    {
        return view('galeria.createAlbum');
    }

    public function store(Request $request)
    {
        $rules = array(
            'name'        => 'required',
            'cover_image' => 'required|image'
        );

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            return redirect()->route('galeria.create')
                ->withErrors($validator)
                ->withInput();
        }

        $file = $request->file('cover_image');
        $random_name = str_random(8);
        $destinationPath = 'images/albums/';
        $extension = $file->getClientOriginalExtension();
        $filename=$random_name.'_cover.'.$extension;
        $uploadSuccess = $request->file('cover_image')->move($destinationPath, $filename);
        $album = Album::create(array(
            'name' => $request->name,
            'description' => $request->description,
            'cover_image' => $filename,
        ));
        return redirect()->route('galeria.album',array('id' => $album->id));
    }

    public function show($id)
    {
        $album = Album::with('Photos')->find($id);
        return view('galeria.album')->with('album',$album);
    }

    public function destroy($id)
    {
        $album = Album::find($id);
        foreach($album->Photos as $photo) {
            unlink('images/albums/' . $photo->image);
        }
        $album->delete();
        unlink('images/albums/' . $album->cover_image);
        return redirect()->route('galeria.index');
    }

}
