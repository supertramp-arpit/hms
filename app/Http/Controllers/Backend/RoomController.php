<?php

namespace App\Http\Controllers\Backend;

use App\Models\City;
use App\Models\Room;
use App\Models\Guest;
use App\Models\Hotel;
use App\Models\State;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\RoomType;
use App\Models\HotelImage;
use App\Models\RoomImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;

class RoomController extends Controller
{
    public function createRoomType(Request $request)
    {
        // Validation rules can be defined here
        $request->validate([
            'name' => 'required|string',
            'capacity' => 'required|numeric',
            'rent_per_night' => 'required|numeric',
            'description' => 'required',
            'hotel_id' => 'required|integer',
        ]);

        // Create a new RoomType instance
        RoomType::create([
            'name' => $request->input('name'),
            'capacity' => $request->input('capacity'),
            'rent_per_night' => $request->input('rent_per_night'),
            'description' => $request->input('description'),
            'hotel_id' => $request->input('hotel_id'),
        ]);

        return redirect()->back()->with('success', 'Room Type added successfully');
    }

    #upload function
    public function UploadImage($storage, $path, $image)
    {

      if (count(array($image)) > 0) {
        $new_name_of_profile_photo = uniqid('', true) . "." . $image->getClientOriginalExtension();
        $image->move($storage, $new_name_of_profile_photo);
        return $path . '/' . $new_name_of_profile_photo;
      } else {
      }
    }


    public function addroom()
{
    $admin = session()->get('admin-auth');

    // Fetch the available room types from the database
    $roomTypes = RoomType::all();

    return view('Backend.Room.Create', ['admin' => $admin, 'roomTypes' => $roomTypes]);
}
public function edit($id)
{
    $roomType = RoomType::find($id);
    $admin=  session()->get('admin-auth');
    return view('Backend.Room.edit_room',['admin'=>$admin,'roomType' => $roomType]);


}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'capacity' => 'required',
        'rent_per_night' => 'required',
        'description' => 'required',
    ]);

    $roomType = RoomType::find($id);
    $roomType->update($validatedData);

    return redirect()->route('add-room_type')->with('success', 'Room Type updated successfully');
}
public function destroy($id)
{
    $roomType = RoomType::find($id);
    if ($roomType) {
        $roomType->delete();
        return redirect()->back()->with('success', 'Room type deleted successfully.');
    }
    return redirect()->back()->with('error', 'Failed to delete room type.');
}


public function addroom_type(){
    $admin = session()->get('admin-auth');

    // Fetch all room types with associated hotel data
    $roomTypesWithHotel = RoomType::with('hotel')->get();

    // Fetch all hotels
    $hotels = Hotel::all();

    // Pagination logic
    $currentPage = request()->get('page', 1); // Get current page from the query string or default to 1
    $perPage = 5; // Number of items per page

    $roomTypesPaginated = $roomTypesWithHotel->forPage($currentPage, $perPage);

    $totalItems = $roomTypesWithHotel->count();

    $paginationData = [
        'current_page' => $currentPage,
        'per_page' => $perPage,
        'total_items' => $totalItems,
        'last_page' => ceil($totalItems / $perPage)
    ];

    return view('Backend.Room.room_type', [
        'admin' => $admin,
        'roomTypesPaginated' => $roomTypesPaginated,
        'hotels' => $hotels,
        'paginationData' => $paginationData
    ]);
}



    public function insertroom(Request $request)
    {
        // Validation
        $this->validate($request, [
            'room_no' => 'required|unique:rooms',
            'room_type_id' => 'required',
            'telephone' => 'required|digits_between:1,10',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4098',
        ], [
            'room_no.unique' => 'This room number already exists.',
        ]);

        try {
            DB::beginTransaction();

            $room = Room::create([
                'room_no' => $request->room_no,
                'room_type_id' => $request->room_type_id,
                'telephone' => $request->telephone,
                'meal' => $request->meal,
                // Add more fields as necessary
            ]);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $item) {
                    if ($item) {
                        $fileName = $this->UploadImage('Cms/Roomimage', '', $item);

                        RoomImages::create([
                            'room_type_id' => $room->room_type_id,
                            'images' => $fileName,
                        ]);
                    }
                }
            }

            DB::commit();

            return redirect()->back()->with(['success' => 'Room inserted successfully']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Something went wrong']);
        }
    }

    public function allroomlist(Request $request){
        $admin = session()->get('admin-auth');
        $query = RoomType::with(['rooms.roomImages'])->orderBy('id', 'desc');

        if ($admin->type === 'maneging_directer' || $admin->type === 'superadmin') {
            // Show all data to managing_director or superadmin
        } else {
            // Get hotel_id associated with the admin ID
            $hotelId = Hotel::where('adminuser_type', $admin->id)->pluck('id')->first();

            // Filter by hotel_id associated with the admin
            $query->where('hotel_id', $hotelId);
        }

        // Search functionality
        if($request->has('search')){
            $searchTerm = $request->input('search');
            $query->where('name', 'like', "%$searchTerm%");
        }

        $allRoomTypes = $query->get();

        // Manually paginate the results...
        $perPage = 6; // Number of items per page
        $currentPage = $request->input('page', 1); // Current page, default is 1
        $sliceOffset = ($currentPage - 1) * $perPage; // Calculate slice offset

        // Get a slice of room types for the current page
        $roomTypes = $allRoomTypes->slice($sliceOffset, $perPage);

        // Calculate total pages for pagination links
        $totalPages = ceil($allRoomTypes->count() / $perPage);


        return view('Backend.Room.AllList', [
            'admin' => $admin,
            'roomTypes' => $roomTypes,
            'totalPages' => $totalPages,
            'currentPage' => $currentPage
        ]);
    }



    public function edit_room($id){
        $admin = session()->get('admin-auth');

        // Fetch the room data by ID
        $room = Room::findOrFail($id);

        // Load other necessary data
        $roomTypes = RoomType::with(['rooms.roomImages'])->orderBy('id', 'desc')->get();

        return view('Backend.Room.Edit', ['admin' => $admin, 'data' => $room, 'roomTypes' => $roomTypes]);
    }
    public function delsignImage($id){
        try {
            RoomImages::where('id',$id)->delete();
            return redirect()->back()->with(['error'=>'Image Deleted Successfully']);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with(['error'=>'Somthing went wrong']);
        }

    }


    #roomImage
    public function roomImage($id){
        try {
            RoomImages::where('room_id',$id)->delete();
            room::where('id',$id)->delete();
            return redirect()->back()->with(['error'=>'Room Deleted Successfully']);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with(['error'=>'Somthing went wrong']);
        }

    }



    public function update_room(Request $request, $id)
    {
        // Validate the input data here as needed

        // Find the room you want to update
        $room = Room::findOrFail($id);
$roomType = RoomType::all();
        // Update the room fields
        $room->room_no = $request->input('room_no');
        $room->meal = $request->input('meal');
        $room->ac_non_ac = $request->input('ac_non_ac');
        $room->telephone = $request->input('telephone');
        $room->status = $request->input('status');

        // Handle image deletions
        if ($request->has('delete_images')) {
            foreach ($request->input('delete_images') as $imageId) {
                $imageToDelete = RoomImages::find($imageId);
                if ($imageToDelete) {
                    // Remove the image file from the server
                    $imagePath = public_path('Cms/Roomimage') . '/' . $imageToDelete->images;
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }

                    // Delete the image record
                    $imageToDelete->delete();
                }
            }
        }

        // Update the room images
        if ($request->hasFile('room_images')) {
            foreach ($request->file('room_images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('Cms/Roomimage'), $imageName);
                $roomImage = new RoomImages();
                $roomImage->images = $imageName;
                $roomImage->room_type_id = $room->room_type_id;
                $roomImage->save();
            }
        }

        // Save the updated room data
        $room->save();

        // Redirect to the room details page or a different page as needed
        return redirect()->route('room-alist')->with('success', 'Room updated successfully');
    }
    public function deleteImage(Request $request, $imageId)
    {
        // Find the image record in the room_images table
        $roomImage = RoomImages::findOrFail($imageId);

        // Delete the image file from the server
        $imagePath = public_path('Cms/Roomimage') . '/' . $roomImage->images;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Delete the image record from the database
        $roomImage->delete();

        // Redirect back to the edit room page or a different page as needed
        return redirect()->back()->with('success', 'Image deleted successfully');

    }
    public function changeStatus($id)
{
    $room = Room::findOrFail($id);
    $newStatus = request()->input('status');

    // Update the status based on the received status value (0 or 1)
    $room->status = $newStatus;
    $room->save();

    return response()->json(['status' => $newStatus]);
}

    public function remove_room($id)
    {
        // Find the room you want to delete
        $room = Room::findOrFail($id);

        // Delete the associated images
        $roomImages = RoomImages::where('room_type_id', $room->id)->get();
        foreach ($roomImages as $image) {
            // Remove the image file from the server
            $imagePath = public_path('Cms/Roomimage') . '/' . $image->images;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Delete the image record
            $image->delete();
        }

        // Delete the room
        $room->delete();

        // Redirect to a different page as needed
        return redirect()->route('room-alist')->with('success', 'Room deleted successfully');
    }


        public function view_room($id) {
        $admin=  session()->get('admin-auth');
        $data = Room::with(['roomType.roomImages'])->find($id);
        return view('Backend.Room.View', ['admin'=>$admin,'data' => $data]);
    }
    public function guest(Request $request)
    {
        $admin = session()->get('admin-auth');
        $search = $request->input('search'); // Get search keyword from request

        // Fetch guests based on search query or get all guests
        $guestsQuery = $search ? Guest::where('name', 'LIKE', "%$search%") : Guest::query();

        // Count total guests for pagination
        $totalGuests = $guestsQuery->count();

        // Manually paginate the guests
        $perPage = 5; // Adjust the number of items per page as needed
        $currentPage = $request->input('page', 1); // Current page, default is 1
        $offset = ($currentPage - 1) * $perPage; // Calculate offset

        $guests = $guestsQuery->offset($offset)->limit($perPage)->get();

        // Calculate total pages for pagination links
        $totalPages = ceil($totalGuests / $perPage);

        return view('backend.room.guest', compact('guests', 'admin', 'totalPages', 'currentPage'));
    }
public function guestBookings($guestId)
    {
        $guest = Guest::find($guestId);

        if (!$guest) {
            // Handle case when the guest is not found
            return redirect()->back()->with('error', 'Guest not found');
        }
        $admin=  session()->get('admin-auth');
        // Fetch bookings related to this guest
        $bookings = Booking::where('guest_id', $guestId)->get();
        $payments = Payment::all();
        return view('backend.room.guest_bookings', compact('bookings', 'guest','admin','payments'));
    }


    // public function activeroomList(){
    //     $admin=  session()->get('admin-auth');
    //     $data = room::orderBy('ID','DESC')->where('status','1')->get();
    //     return view('Backend.Room.ActiveList',['admin'=>$admin,'data'=>$data]);
    // }



    // public function reserveroomList(){
    //     $admin=  session()->get('admin-auth');
    //     $data = room::orderBy('ID','DESC')->where('status','1')->get();
    //     return view('Backend.Room.ReserveList',['admin'=>$admin,'data'=>$data]);
    // }

    // public function activate_room($id){
    //     $data=room::find($id);
    //     $data->status=1;
    //     $data->save();
    //     return redirect()->back()->with(['success'=>'User Status Change']);
    // }
    // public function deactivate_room($id){
    //     $data=room::find($id);
    //     $data->status=2;
    //     $data->save();
    //     return redirect()->back()->with(['success'=>'User Status Change']);
    // }
    // public function reserved_room($id){
    //     $data=room::find($id);
    //     $data->status=1;
    //     $data->save();
    //     return redirect()->back()->with(['success'=>'User Status Change']);
    // }

    public function showHotelList(Request $request)
{
    $admin = session()->get('admin-auth');
    $adminId = $admin->id;
    $isAdmin = $admin->type === 'managing_director' || $admin->type === 'superadmin';

    $hotelsQuery = Hotel::query()->with('images', 'city'); // Load images and city relationship

    if (!$isAdmin) {
        // If not managing_director or superadmin, filter by adminuser_type column
        $hotelsQuery->where('adminuser_type', $adminId);
    }

    if ($request->has('search')) {
        $searchTerm = $request->input('search');
        $hotelsQuery->where('name', 'like', '%' . $searchTerm . '%');
    }

    // Get all the hotels that match the query
    $allHotels = $hotelsQuery->get();

    // Manually paginate the results
    $perPage = 5; // Adjust the number of items per page as needed
    $currentPage = $request->input('page', 1); // Current page, default is 1
    $sliceOffset = ($currentPage - 1) * $perPage; // Calculate slice offset

    // Get a slice of hotels for the current page
    $hotels = $allHotels->slice($sliceOffset, $perPage);

    // Calculate total pages for pagination links
    $totalPages = ceil($allHotels->count() / $perPage);

    return view('Backend.Room.hotel', compact('hotels', 'admin', 'totalPages', 'currentPage'));
}


    public function hotel_create( ){
        $admin= session()->get('admin-auth');
        $states = State::with('cities')->get();

        return view('Backend.Room.create_hotel',compact('admin', 'states'));
    }

    public function getCitiesByState(Request $request)
    {
        $data = City::where("state_id", $request->get('state_id'))->get();

        $length = $data->count();
        $arrayData = [];
        for ($i=0;$i<$length;$i++) {
            array_push($arrayData, $data[$i]);
        }
        $ja = json_encode($arrayData);
        return $ja;
     }

     public function deleteHotelImage($id)
     {
         $image = HotelImage::findOrFail($id);

         // Delete the image from storage
         Storage::delete($image->image_path);

         // Delete the image record from the database
         $image->delete();

         return response()->json(['message' => 'Image deleted successfully']);
     }
    public function add_hotel(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'stars' => 'required|integer|min:1|max:5', // Assuming stars are integers from 1 to 5
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for images
    ], [
        'name.required' => 'The name field is required.',
        'name.max' => 'The name may not be greater than 255 characters.',
        'address.required' => 'The address field is required.',
        'address.max' => 'The address may not be greater than 255 characters.',
        'city.required' => 'The city field is required.',
        'city.max' => 'The city may not be greater than 255 characters.',
        'state.required' => 'The state field is required.',
        'state.max' => 'The state may not be greater than 255 characters.',
        'stars.required' => 'The stars field is required.',
        'stars.integer' => 'The stars must be an integer.',
        'stars.min' => 'The stars must be at least 1.',
        'stars.max' => 'The stars may not be greater than 5.',
        'images.*.image' => 'The uploaded file must be an image.',
        'images.*.mimes' => 'Only JPEG, PNG, JPG, and GIF images are allowed.',
        'images.*.max' => 'The image may not be greater than 2048 kilobytes.',
    ]);
    $adminId= session()->get('admin-auth');


    // Create a new hotel instance with validated data
    $hotel = new Hotel([
        'name' => $validatedData['name'],
        'address' => $validatedData['address'],
        'city' => $validatedData['city'],
        'state' => $validatedData['state'],
        'stars' => $validatedData['stars'],
        'adminuser_type' => $adminId->id,
        // Add other fields as needed
    ]);
    $hotel->save();

    // Handle multiple image uploads
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('hotel_images'), $imageName);

            // Create a new HotelImage instance and associate it with the hotel
            $hotelImage = new HotelImage(['image_path' => 'hotel_images/' . $imageName]);
            $hotel->images()->save($hotelImage);
        }
    }

    // Optionally, you can return a response or redirect somewhere
    return redirect()->route('hotel')->with('success', 'Hotel added successfully');
}
public function update_hotel(Request $request, $id)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'stars' => 'required|integer|min:1|max:5', // Assuming stars are integers from 1 to 5
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for images
    ], [
        'name.required' => 'The name field is required.',
        'name.max' => 'The name may not be greater than 255 characters.',
        'address.required' => 'The address field is required.',
        'address.max' => 'The address may not be greater than 255 characters.',
        'city.required' => 'The city field is required.',
        'city.max' => 'The city may not be greater than 255 characters.',
        'state.required' => 'The state field is required.',
        'state.max' => 'The state may not be greater than 255 characters.',
        'stars.required' => 'The stars field is required.',
        'stars.integer' => 'The stars must be an integer.',
        'stars.min' => 'The stars must be at least 1.',
        'stars.max' => 'The stars may not be greater than 5.',
        'images.*.image' => 'The uploaded file must be an image.',
        'images.*.mimes' => 'Only JPEG, PNG, JPG, and GIF images are allowed.',
        'images.*.max' => 'The image may not be greater than 2048 kilobytes.',
    ]);

    // Find the hotel by ID
    $hotel = Hotel::findOrFail($id);

    // Update hotel instance with validated data
    $hotel->update([
        'name' => $validatedData['name'],
        'address' => $validatedData['address'],
        'city' => $validatedData['city'],
        'state' => $validatedData['state'],
        'stars' => $validatedData['stars'],
        // Add other fields as needed
    ]);

    // Handle multiple image uploads
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('hotel_images'), $imageName);

            // Create a new HotelImage instance and associate it with the hotel
            $hotelImage = new HotelImage(['image_path' => 'hotel_images/' . $imageName]);
            $hotel->images()->save($hotelImage);
        }
    }

    // Optionally, you can return a response or redirect somewhere
    return redirect()->route('hotel')->with('success', 'Hotel updated successfully');
}

public function edit_hotel($id)
{
    $admin = session()->get('admin-auth');

    $hotel = Hotel::findOrFail($id);
    // Load associated hotel images
    $hotel->load('images');

    // Fetch all states to pass to the view
    $states = State::all(); // Replace 'State' with your actual State model name

    return view('Backend.Room.update_hotel', compact('hotel', 'admin', 'states'));
}
// Inside your controller, create a method to handle the delete action
public function deleteHotel($id) {
    $hotel = Hotel::find($id);
    if ($hotel) {
        $hotel->delete();
        return response()->json(['message' => 'Hotel deleted successfully']);
    } else {
        return response()->json(['error' => 'Hotel not found'], 404);
    }
}

public function toggleStatus($id)
{
    $hotel = Hotel::find($id);
    if ($hotel) {
        $hotel->status = request()->status;
        $hotel->save();

        return response()->json(['status' => $hotel->status]);
    }
    return response()->json(['error' => 'Hotel not found.'], 404);
}

}
