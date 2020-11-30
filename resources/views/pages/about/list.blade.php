@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">List of About</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">List of About</li>
        </ol>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Sub_Title</th>
                <th scope="col">Description</th>
                <th scope="col">image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            
            <tbody>
                @if(count($abouts) >0)
                @foreach ($abouts as $about)
                <tr>
                    <td scope="row">{{$about->id}}</td>
                    <td>{{$about->title}}</td>
                    <td>{{$about->sub_title}}</td>
                    <td>{{Str::limit(strip_tags($about->description),40)}}</td>
                    <td><img src="{{url($about->image)}}" alt="" height="50px" width="50px"> </td>
                    
                    <td>
                      <div class="row">
                        <div>
                        <a href="{{route('admin.abouts.edit',$about->id)}}" class="btn btn-primary m-2"><i class="fas fa-edit"></i></a>
                        </div>
                        <div>
                          <form action="{{route('admin.abouts.destroy',$about->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" value="delete" class="btn btn-danger m-2"><i class="fas fa-trash"></i></button>
                          </form>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
                @endif
            </tbody>
          </table>
</main>
@endsection
               
              
