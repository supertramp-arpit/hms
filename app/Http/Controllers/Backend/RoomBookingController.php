<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\RoomBookedConfirmationMail;
use App\Models\Client;
use App\Models\Room;
use App\Models\RoomBooking;
use App\Notifications\SMSNotification;
use Illuminate\Vonage\Client\Credentials\Basic;
use Illuminate\Http\Request;
use Illuminate\Notifications\Events\NotificationSent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class RoomBookingController extends Controller
{
    public function room_booking(){
        $admin=  session()->get('admin-auth');
        $client = Client::orderBy('id','DESC')->paginate(10);
      
        return view('Backend.RoomBooking.RoomBooking',['admin'=>$admin,'data'=>$client]);
    }

    public function room_booking_save(Request $request,$id){
    
             try {
                $room = Room::where('room_type',$request->room_type)->where('status','1')->first();
               $room_num =  str_replace('"', '', $room->room_number);
            
                if($room){
                    RoomBooking::create([
                        'room_type'=> $request->room_type,
                        'client_name'=> $request->name,
                        'client_username'=>$request->username,
                        'client_id'=> $id,
                        'room_number'=> $room->room_number,
                     ]);
                     
                     $data = Client::find($id);
                     $data->assign = '2';
                     $data->save();
        
                     $room->status = '3';
                     $room->save();
                     
                     try {
                        $name = $request->name;
                        $room = $room->room_number;
                        $email = $request->email;
                        $message = new RoomBookedConfirmationMail($name, $room);
                      
                        Mail::to('krishnachauhan.4443org@gmail.com')->send($message);
                    } catch (\Exception $e) {
                        
                        return redirect()->back()->with(['error' => "Opps! Mail Not Send, Please try again."]);
                    }
                   
                    return redirect()->back()->with(['success'=>"Room Number {$room_num} Booked Successfully"]);
                }else{
                        return redirect()->back()->with(['error'=>"Room Number {$room_num} Not Available"]);
                    }   
            
            } 
            catch (\Throwable $th) {
               
                return redirect()->back()->with(['error'=>'Opps! Something went wrong, Please try again.']);
            }
           
      
    }


    public function RoomAvailability(){
        $admin=  session()->get('admin-auth');
        $room = Room::get();

        return view('Backend.RoomBooking.RoomAvailablity',['admin'=>$admin,'room'=>$room]);   
    }

    public function searchRoomType(Request $request){
        $admin=  session()->get('admin-auth');
        $search = $request->input('search');
        $room = Room::where('room_type', 'LIKE', "%{$search}%")->get();
        return view('Backend.RoomBooking.RoomAvailablity',['admin'=>$admin,'room'=>$room]);
    }
    public function searchRoomStatus(Request $request){
        $admin=  session()->get('admin-auth');
        $search = $request->input('search');
        $room = Room::where('status', 'LIKE', "%{$search}%")->get();
        return view('Backend.RoomBooking.RoomAvailablity',['admin'=>$admin,'room'=>$room]);
    }

    public function Roomstatus($id){
        $admin=  session()->get('admin-auth');
         $roomId = Room::where('id',$id)->first();
        $room = DB::table('room')->get();
        return view('Backend.RoomBooking.RoomStatus',['admin'=>$admin,'room'=>$room,'roomId'=>$roomId]); 
    }

    public function Roomstatusupdate(Request $request){
       
        $data = Room::where('id',$request->room_id)->first();
        $data->status = $request->status;
        $data->save();
        return redirect(url('room-availability-overview'))->with(['success'=>"Room {$data->room_number} status Changed Successfully"]); 
    }
}
