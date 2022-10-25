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
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Type</th>
            <th scope="col">Date</th>
         </tr>
         </thead>
         <tbody>
            @if (count($memberships_data) > 0)
               @foreach ($memberships_data as $value)
                  @php
                     if ($value->memberships_type == '1') {
                        $data = "Primium User";
                     }elseif($value->memberships_type == '0'){
                        $data = "Free User";
                     }
                  @endphp
                  <tr>
                     <th class="w-25">
                        <a href="{{url('/membership/edit/'.$value->memberships_id)}}" class="btn btn-primary" >Edit</a>
                        <a href="{{url('/membership/delete/'.$value->memberships_id)}}" class="btn btn-danger">Delete</a>
                     </th>
                     <td>{{$value->memberships_id}}</td>
                     <td>{{$value->memberships_name}}</td>
                     <td>{{$value->memberships_email}}</td>
                     <td>{{$data}}</td>
                     <td>{{ Carbon::parse($value->created_at)->format('Y-m-d')}}</td>
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