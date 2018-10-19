@extends('layouts.admin')
 @section('contenido')
 <div class="container ">
    <div class="row text-center">
        <div class="col-md-12 ">
        <h3>Image Uploading using dropzone js in laravel</h3>
		
		{{ Form::open(array('url' => 'imageUpload', 'method' => 'PUT', 'name'=>'product_images', 'id'=>'myImageDropzone', 'class'=>'dropzone', 'files' => true)) }}
 
		{{ Form::close() }}
        </div>
    </div>
 </div>
 @endsection