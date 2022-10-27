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
        {{-- @php
            echo '<pre>';
            print_r($membership_data);
            exit;
        @endphp --}}
        @foreach ($membership_data as $value)
        
            @if(Auth::user()->name == $value->memberships_name)
                @php
                    $memberships_type = $value->memberships_type;
                @endphp
            @endif
        @endforeach

        @if ($memberships_type == '1')
            @php
                $data = "Premium User";
            @endphp
        @elseif($memberships_type == '0')
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
                    <textarea type="text" class="form-control" id="post_description" name="post_description" rows="4" placeholder="Enter Post Description"></textarea>
                </div>
                <div class="form-group">
                    <label for="type">Post Type</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="{{$memberships_type}}" class="d-none" selected>
                            {{$data}}
                            {{-- {{$memberships_type}} --}}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="post_description">Post Author</label>
                    <input type="text" class="form-control" id="posts_author" name="posts_author" value="{{Auth::user()->name}}" placeholder="Post Author">
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-3"></div>
        
    </div>
   </div>
@endsection