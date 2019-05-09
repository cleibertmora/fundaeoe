<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Album;
use App\Image;

class ImagesController extends Controller
{
    public function create($id)
    {
        $album = Album::find($id);
        return view('galeria.addImage')->with('album',$album);
    }

    public function store(Request $request)
    {
        $rules = array(
            'album_id' => 'required|numeric|exists:albums,id',
            'image'    => 'required|image'
        );
    
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            return redirect()->route('galeria.createImage', array('id' => $request->album_id))
                ->withErrors($validator)
                ->withInput();
        }

        $file = $request->file('image');
        $random_name = str_random(8);
        $destinationPath = 'images/albums/';
        $extension = $file->getClientOriginalExtension();
        $filename=$random_name.'_album_image.'.$extension;
        $uploadSuccess = $request->file('image')->move($destinationPath, $filename);
        if (Auth::user()->admin())
        {
            $publicar = 1;
        } else {
            $publicar = 0;
        }
        Image::create(array(
            'description' => $request->description,
            'image'       => $filename,
            'album_id'    => $request->album_id,
            'publicar'    => $publicar
        ));

        return redirect()->route('galeria.album',array('id'=>$request->album_id));
    }

    public function publicar(Request $request, $id)
    {
        $image = Image::find($id);
        $image->publicar = 1;
        $image->description = $request->description;
        $image->save();
        return redirect()->route('galeria.album',array('id'=>$image->album_id));
    }

    public function destroy($id)
    {
        $image = Image::find($id);
        $image->delete();
        unlink('images/albums/' . $image->image);
        return redirect()->route('galeria.album',array('id'=>$image->album_id));
    }
}