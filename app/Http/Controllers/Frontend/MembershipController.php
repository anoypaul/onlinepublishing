<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Frontend\MembershipModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index(){
        $memberships_data = DB::table('memberships')
            ->orderBy('memberships_id', 'desc')
            ->get();
        return view('frontend.user.membership.index', compact('memberships_data'));
    }
    public function create(){
        return view('frontend.user.membership.create');
    }
    public function store(Request $request){

        // $request->validate([
        //     'name' => 'required|unique:posts',
        //     'email' => 'required|unique:posts',
        // ]);
        
        // $previous_data = DB::table('memberships')
        //     ->get();
        // if ($previous_data[0]->memberships_email == $request->email) {
        //     $request->session()->flash('status', 'Do not Submit Duplicate Data!');
        //     return redirect('/membership/create');
        // }

        $memberships = new MembershipModel();
        $memberships->memberships_name = $request->name;
        $memberships->memberships_email = $request->email;
        $memberships->memberships_type = $request->type;
        $memberships->save();
        $request->session()->flash('status', 'Task was successful!');
        return redirect('/membership/index');
    }
    public function edit($id){
        $memberships_particular_data = MembershipModel::find($id);
        return view('frontend.user.membership.edit', compact('memberships_particular_data'));
    }
    public function update(Request $request, $id){
        $data = MembershipModel::find($id);
        $data->memberships_name = $request->name;
        $data->memberships_email = $request->email;
        $data->memberships_type = $request->type;
        $data->save();
        $request->session()->flash('status', 'Data Update successful!');
        return redirect('/membership/index');
    }
    public function delete($id){
        MembershipModel::find($id)->delete();
        return redirect()->back()->with('status', 'Data Delete Successfully');
    }
}
