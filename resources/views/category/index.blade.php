@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(Session::has('message'))
            <div class="alert alert-success" role="alert">
            {{Session::get('message')}}

             </div>
           
            @endif 
            <div class="card">
                <div class="card-header">All Category


                <span class="float-right p-5">

<a href="{{route('category.create')}}">

<button type="submit" class="btn btn-outline-secondary">

Add Category

</button>

</a>
</span>
                </div>

                <div class="card-body">

                <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @if(count($categories)>0)
    @foreach($categories as $key=>$category)

    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$category->name}}</td>
      <td>
        <a href="{{route('category.edit',[$category->id])}}">@csrf

        <button class="btn btn-outline-success">Edit</button>
         </a>

      </td>
      <td>
      <a href="">

      <form action="{{route('category.destroy',[$category->id])}}" method="post">@csrf
      {{method_field('DELETE')}}

      <button class="btn btn-outline-danger">Delete</button>

    

      </form>

       
       </a>


      </td>
    </tr>

    @endforeach
    @else
    <td> No category to display</td>
    @endif
    
  </tbody>
</table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection