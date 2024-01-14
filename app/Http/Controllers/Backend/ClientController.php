<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function cleint_query(){
        $admin=  session()->get('admin-auth');
        $data = Client::orderBy('id','DESC')->paginate(10);
        return view('Backend.Client.ClientQuery',['admin'=>$admin,'data'=>$data]);
    }


    public function activeclient($id){
        $data=Client::find($id);
        $data->status=2;
        $data->save();
        return redirect()->back()->with(['error'=>"{$data->name} Blocked Successfully"]);
    }

    public function deactiveclient($id){
        $data=Client::find($id);
        $data->status=1;
        $data->save();
        return redirect()->back()->with(['success'=>"{$data->name} Activated Successfully"]);
    }

    public function deactiveDelete($id){
        try {
            $data=Client::where('id',$id)->delete();
            return redirect()->back()->with(['error'=>"Client Deleted Successfully"]); 
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>"Something went wrong"]); 
        }
        
    }
}
