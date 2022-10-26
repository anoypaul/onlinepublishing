<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Frontend\MembershipModel;
use App\Models\Frontend\PostModel;
use Illuminate\Http\Request;
use DateTime;

class PostController extends Controller
{
    public function index(){
        $data = DB::table('posts')->orderBy('posts_id', 'desc')->get();
        return view('frontend.user.post.index', compact('data'));
    }
    public function create(){
        $membership_data = DB::table('users')
        ->join('memberships', 'users.name', '=', 'memberships.memberships_name')
        ->get();
        return view('frontend.user.post.create', compact('membership_data'));
    }
    public function store(Request $request){
        // echo '<pre>';
        // print_r($request->all());
        // exit;
        if (today() && $request->type == '0') {
            $data = DB::table('posts')->get();
            $type = 1;
            foreach($data as $value){
                $date = new DateTime($value->created_at);
                $date_check = $date->format("Y/m/d");
                if (date_format(today(),"Y/m/d") == $date_check) {
                    if($value->posts_type == 0 && $value->posts_author == $request->posts_author){ //check 
                        $type = $type + 1;
                    }
                }
            }
            if ($type > 2) {
                $request->session()->flash('status', 'Free Member create 2 post in a day!');
                return redirect()->back();
            }
            else{
                $post_data = new PostModel();
                $post_data->posts_title = $request->post_title;
                $post_data->posts_description = $request->post_description;
                $post_data->posts_type = $request->type;
                $post_data->posts_author = $request->posts_author;
                $post_data->save();
                $request->session()->flash('status', 'Data Insert successfully!');
                return redirect()->back();
            }            
        }
        elseif(today() && $request->type == '1'){
            $post_data = new PostModel();
            $post_data->posts_title = $request->post_title;
            $post_data->posts_description = $request->post_description;
            $post_data->posts_type = $request->type;
            $post_data->posts_author = $request->posts_author;
            $post_data->save();
            $request->session()->flash('status', 'Data Insert successfully!');
            return redirect()->back();
        }
  
    }
    public function edit($id){
        $post_data = PostModel::find($id);
        return view('frontend.user.post.edit', compact('post_data'));
    }
    public function update(Request $request, $id){
        $post_data = PostModel::find($id);
        $post_data->posts_title = $request->post_title;
        $post_data->posts_description = $request->post_description;
        $post_data->posts_type = $request->type;
        $post_data->save();
        $request->session()->flash('status', 'Data Update successfully!');
        return redirect()->back();
    }
    public function delete($id){
        $post_data = PostModel::find($id)->delete();
        return redirect()->back()->with('status', 'Data Delete Successfully');
    }
}
