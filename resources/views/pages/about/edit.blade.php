@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    <form action="{{route('admin.abouts.update',$abouts->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
              
            <div class="form-group col-md-4 mt-3">
                <div class="mb-3">
                    <label for="title"><h4>Title</h4></label>
                    <input type="text" id="title" name="title" class="form-control" value="{{$abouts->title}}">
                </div>
            
                <div class="mb-3">
                    <label for="sub_title"><h4>Sub Title</h4></label>
                    <input type="text" id="sub_title" name="sub_title" class="form-control" value="{{$abouts->sub_title}}">
                </div>
                <div class="mb-3">
                    <label for="description"><h4>Description</h4></label>
                    <br>
                    <textarea name="description" id="description" class="form-control">{{$abouts->description}}</textarea>
                </div>
                <h3>Image</h3>
                <img style="height: 30vh" src="{{url($abouts->image)}}" alt="" class="img-thumbnail">
                    <input type="file"  name="image" class="mt-3">
            </div>
           
         </div>
         <input type="submit" name="submit" value="Update" class="btn btn-primary mt-5">

    </div>
    </form>
</main>
@endsection
               
              
