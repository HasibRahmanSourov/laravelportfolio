@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    <form action="{{route('admin.portfolios.update',$portfolios->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
              
            <div class="form-group col-md-4 mt-3">
                <div class="mb-3">
                    <label for="title"><h4>Title</h4></label>
                    <input type="text" id="title" name="title" class="form-control" value="{{$portfolios->title}}">
                </div>
            
                <div class="mb-3">
                    <label for="sub_title"><h4>Sub Title</h4></label>
                    <input type="text" id="sub_title" name="sub_title" class="form-control" value="{{$portfolios->sub_title}}">
                </div>
                <div class="mb-3">
                    <label for="description"><h4>Description</h4></label>
                    <br>
                    <textarea name="description" id="description" class="form-control">{{$portfolios->description}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="client"><h4>Client</h4></label>
                    <input type="text" id="client" name="client" class="form-control" value="{{$portfolios->client}}">
                </div>
            
                <div class="mb-3">
                    <label for="category"><h4>Category</h4></label>
                    <input type="text" id="category" name="category" class="form-control" value="{{$portfolios->category}}">
                </div>
            </div>
            <div class="form-group col-md-8 mt-5">
                <h3>Big Image</h3>
            <img style="height: 30vh" src="{{url($portfolios->big_image)}}" alt="" class="img-thumbnail">
                <input type="file"  name="big_image" class="mt-3">
                <h3 class="mt-3">Small Image</h3>
                <img style="height: 20vh" src="{{url($portfolios->small_image)}}" alt="" class="img-thumbnail">
                <input type="file"  name="small_image" class="mt-3">
            </div>
            <input type="submit" name="submit" value="Update" class="btn btn-primary mt-5">
         </div>

    </div>
    </form>
</main>
@endsection
               
              
