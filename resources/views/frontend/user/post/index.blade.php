@extends('layouts.user_master')

@section('user_content')
   <div class="container">
      <div class="row">
         <div>
            <div class="row" id="message">
                  @if (Session::has('status'))
                     <div class="col-10">
                        <p class="alert alert-primary">{{Session::get('status')}}</p>
                     </div>
                     <div class="col-2">
                        <button class="btn btn-primary" id="" onclick="remove()">X</button>
                     </div>
                  @endif
            </div>
           
         </div>
      </div>
      <table class="table table-bordered">
         <thead>
         <tr>
            <th scope="col">Action</th>
            <th scope="col">Id</th>
            <th scope="col">Post Title</th>
            <th scope="col">Description</th>
            <th scope="col">Type</th>
            <th scope="col">Author</th>
         </tr>
         </thead>
         <tbody>
            @if (count($data) > 0)
               @foreach ($data as $value)
                  @php
                     if ($value->posts_type == 1) {
                        $data = "Primium User";
                     }elseif($value->posts_type == 0){
                        $data = "Free User";
                     }
                  @endphp
                  <tr>
                     <th class="w-25">
                        <a href="{{url('/post/edit/'.$value->posts_id)}}" class="btn btn-primary" >Edit</a>
                        <a href="{{url('/post/delete/'.$value->posts_id)}}" class="btn btn-danger">Delete</a>
                     </th>
                     <td>{{$value->posts_id}}</td>
                     <td>{{$value->posts_title}}</td>
                     <td>{{$value->posts_description}}</td>
                     <td>{{$data}}</td>
                     <td>{{$value->posts_author}}</td>
                  </tr>
               @endforeach
            @else
               <tr>
                  <td class="text-center" colspan="5">No Data</td>
               </tr>
            @endif

         </tbody>
      </table>
   </div>
@endsection