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

        @if (Auth::user()->role_as == '1')
            @php
                $data = "Premium User";
            @endphp
        @elseif(Auth::user()->role_as == '0')
            @php
                $data = "Free User";
            @endphp
        @endif

        <div class="col-3"></div>
        <div class="col-6 border p-2">
            <form action="{{url('/post/store')}}" method="POST">
                @csrf
                <div class="form-group">
                <label for="post_title">Post Title</label>
                <input type="text" class="form-control" id="post_title" name="post_title" placeholder="Enter Post Title">
                </div>
                <div class="form-group">
                <label for="post_description">Post Description</label>
                <input type="text" class="form-control" id="post_description" name="post_description" placeholder="Enter Post Description">
                </div>
                <div class="form-group">
                <label for="type">Post Type</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="{{Auth::user()->role_as}}" class="d-none" selected>
                            {{$data}}
                        </option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-3"></div>
        
    </div>
   </div>
@endsection