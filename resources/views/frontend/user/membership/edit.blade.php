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
    <div class="row">
         
        @if ($memberships_particular_data->memberships_type == '1')
            @php
                $data = "Premium User";
            @endphp
        @elseif($memberships_particular_data->memberships_type == '0')
            @php
                $data = "Free User";
            @endphp
        @endif

        <div class="col-3"></div>
        <div class="col-6 border p-2">
            <h3 class="text-center">Edit Data</h3>
            <form action="{{url('/membership/update/'.$memberships_particular_data->memberships_id)}}" method="POST">
                @csrf
                <div class="form-group">
                <label for="Name">Member Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}" placeholder="Enter name">
                </div>
                <div class="form-group">
                <label for="Email">Member Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}" placeholder="Enter Email">
                </div>
                <div class="form-group">
                <label for="Email">Member Type</label>
                    <select name="type" id="type" class="form-control" value="" required>
                        <option value="{{$memberships_particular_data->memberships_type}}" class="d-none" selected>
                            {{$data}}
                        </option>
                        <option value="0">Free User</option>
                        <option value="1">Premium User</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-3"></div>
        
    </div>
   </div>
@endsection