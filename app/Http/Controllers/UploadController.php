<?php

namespace gestion\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use File;

class UploadController extends Controller
{
    public function upload(){

   
        return view('upload.upload');

    }
    public function uploadd(Request $request){

        //para obtener {{Storege::url()}}
        //
      /*  if( $request->hasFile('file')){
            $request->file('file')->store('public/upload');
        }*/
        if($request->hasFile('file'))
    	{
    		$imageFile = $request->file('file');
    		$imageName = uniqid().$imageFile->getClientOriginalName();
    		$imageFile->move(public_path('uploads'), $imageName);
    	}
    	return response()->json(['Status'=>true, 'Message'=>'Image(s) Uploaded.']);
       // return back()->with('info','Se guardo');

    }
}
