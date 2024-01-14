<?php

namespace App\Http\Controllers\Backend;

use App\Models\Room;
use App\Models\Guest;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function admin_dashboard(){
        $admin = session()->get('admin-auth');
        $guestCount = Guest::count();
        $hotelCount = Hotel::count();
        $roomCount = Room::count();

        return view('Backend.Dashboard.Dashboard', ['admin' => $admin], compact('guestCount', 'hotelCount', 'roomCount'));
    }

}
