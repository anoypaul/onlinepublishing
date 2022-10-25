<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Frontend\MembershipModel;
use App\Models\Frontend\PostModel;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        $data = DB::table('posts')->get();
        // echo '<pre>';
        // print_r(today());
        // exit;
        foreach($data as $value){
            // if (date_format(today(),"Y/m/d") == date_format($value->created_at,"Y/m/d")) {
                $date = $value->created_at;
                // echo date_format(today(),"Y/m/d");
                echo date_format($date,"Y/m/d H:i:s");
                // if($data == '2'){
                //     break;
                // }
            // }
        }
        exit;
        // echo '<pre>';
        // print_r($data);
        // exit;
        // $today_post = 
        return view('frontend.user.post.create');
    }
    public function store(Request $request){
        // $post_data_check = DB::table('posts')->get();
        // echo '<pre>';
        // print_r($post_data_check);
        // exit;
        
       
        if (today() && $request->type == '0') {
            
            // if($data < 2){
            $post_data = new PostModel();
            $post_data->posts_title = $request->post_title;
            $post_data->posts_description = $request->post_description;
            $post_data->posts_type = $request->type;
            $post_data->save();

            return redirect()->back();
            // }
        }
  
    }
}
