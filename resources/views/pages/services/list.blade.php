@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">List of services</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">List of services</li>
        </ol>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Icon</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            
            <tbody>
                @if(count($services) >0)
                @foreach ($services as $service)
                <tr>
                    <td scope="row">{{$service->id}}</td>
                    <td>{{$service->icon}}</td>
                    <td>{{$service->title}}</td>
                    <td>{{Str::limit(strip_tags($service->description),40)}}</td>
                    <td>
                      <div class="row">
                        <div class="col-sm-3">
                        <a href="{{route('admin.services.edit',$service->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        </div>
                        <div class="col-sm-3">
                          <form action="{{route('admin.services.destroy',$service->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" value="delete" class="btn btn-danger"><i class="fas fa-trash"></i></button>
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
               
              
