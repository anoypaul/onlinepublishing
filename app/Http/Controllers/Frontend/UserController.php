<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function read(){
        $posts_data = DB::table('posts')->orderBy('posts_id', 'desc')->get();
        return view('frontend.visitor.index', compact('posts_data'));
    }
    public function index(){
        return view('frontend.user.deshboard.index');
    }

}
