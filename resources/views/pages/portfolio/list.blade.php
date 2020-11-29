@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">List of portfolio</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">List of Projects</li>
        </ol>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Sub_Title</th>
                <th scope="col">Big_image</th>
                <th scope="col">Small_image</th>
                <th scope="col">Description</th>
                <th scope="col">Client</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            
            <tbody>
                @if(count($portfolios) >0)
                @foreach ($portfolios as $portfolio)
                <tr>
                    <td scope="row">{{$portfolio->id}}</td>
                    <td>{{$portfolio->title}}</td>
                    <td>{{$portfolio->sub_title}}</td>
                    <td><img src="{{url($portfolio->big_image)}}" alt="" height="50px" width="50px"> </td>
                    <td><img src="{{url($portfolio->small_image)}}" alt="" height="50px" width="50px"> </td>
                    <td>{{Str::limit(strip_tags($portfolio->description),40)}}</td>
                    <td>{{$portfolio->client}}</td>
                    <td>{{$portfolio->category}}</td>
                    
                    <td>
                      <div class="row">
                        <div>
                        <a href="{{route('admin.portfolios.edit',$portfolio->id)}}" class="btn btn-primary m-2"><i class="fas fa-edit"></i></a>
                        </div>
                        <div>
                          <form action="{{route('admin.portfolios.destroy',$portfolio->id)}}" method="post">
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
               
              
