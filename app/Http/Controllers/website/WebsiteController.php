<?php

namespace App\Http\Controllers\website;
use Carbon\Carbon;
use Stripe\Stripe;
use App\Models\Cart;
use App\Models\City;
use App\Models\Room;
use App\Models\Guest;
use App\Models\Hotel;
use App\Models\State;
use App\Models\Client;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\customer;
use App\Models\RoomType;
use App\Models\Wishlist;
use App\Models\ContactUs;
use Stripe\PaymentIntent;
use App\Mail\WelcomeEmail;

use App\Models\HotelImage;
use App\Models\RoomImages;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use App\Mail\PasswordResetMail;
use App\Mail\BookingConfirmation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Notifications\PasswordResetNotification;

class WebsiteController extends Controller
{

    public function show()
{

    $view2 = view('user.404')->render();
    $view3 = view('user.blog')->render();

    $view5 = view('user.contact')->render();
    $view6 = view('user.gallery')->render();

    $view8 = view('user.index-activities')->render();
    $view9 = view('user.index-gym')->render();
    $view10 = view('user.index-package-offer')->render();
    $view11 = view('user.index-restaurant')->render();
    $view12 = view('user.index-spa')->render();
    $view13 = view('user.location')->render();
    $view14 = view('user.room-list-compact')->render();


    $view17 = view('user.single')->render();
    $view18 = view('user.spa_service_details')->render();
    $view19 = view('user.spa_treatment_details')->render();

    $content =  $view2 . $view3. $view5. $view6. $view8. $view9. $view10. $view11. $view12. $view13. $view14.  $view17. $view18. $view19  ;

    return response($content);
}

public function room($id)
{
    $roomType = RoomType::find($id);

    if (!$roomType) {
        return abort(404);
    }

    // Fetch the associated hotel data using the established relationship
    $hotel = $roomType->hotel; // Assuming the relationship is named 'hotel'

    // Fetch room images associated with the room type
    $roomImages = $roomType->roomImages;

    return view('user.room-single', compact('roomType', 'roomImages', 'hotel'));
}

// RoomController.php
public function index()
{
    $rooms = Room::whereHas('roomType', function ($query) {
            $query->whereHas('hotel', function ($query) {
                $query->where('status', 1);
            });
        })
        ->where('status', 1)
        ->with('roomImages', 'roomType', 'hotel')
        ->get();

    return view('user.room-list', ['rooms' => $rooms]);
}
public function register(Request $request)
{
    // Validate and store the registration data, including the profile pic.
    // Remember to hash the password before storing it in the database.

    // Example code:
    }
    public function home()
    {
        // Retrieve hotels, states, and cities
        $hotels = Hotel::where('status', 1)->with('state', 'city', 'images')->get();
        $states = State::all();
        $cities = City::all();

        // Check if the user is authenticated
        if (auth()->check()) {
            // If the user is authenticated, retrieve wishlist data
            $userWishlist = Wishlist::where('guest_id', auth()->user()->id)->pluck('hotel_id')->toArray();
        } else {
            // If the user is not authenticated, set wishlist to an empty array
            $userWishlist = [];
        }

        // Retrieve rooms with room images and room type
        $rooms = Room::with('roomImages', 'roomType')->get();

        return view('user.index', compact('hotels', 'states', 'cities', 'rooms', 'userWishlist'));
    }

// public function list()
// {
//     $rooms = Room::with('AllImg')->get(); // Eager load room images

//     return view('user.avialableroom', ['rooms' => $rooms]);
// }



public function create()
{
    return view('user.registration_form');
}

public function add(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => ['required', 'regex:/^[a-zA-Z ]*$/'], // Valid name without special characters
        'id_proof' => ['required', 'regex:/^[a-zA-Z0-9 ]*$/', 'unique:guests,id_proof'], // ID proof without special characters
        'email' => ['required', 'email', 'unique:guests,email'], // Valid email format and unique
        'mobile' => ['required', 'numeric', 'digits:10', 'unique:guests,mobile'], // Numeric and exactly 10 digits
        'password' => 'required',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Added validation for image upload
    ], [
        'name.required' => 'Name is required.',
        'name.regex' => 'Invalid name format. Only alphabets and spaces allowed.',
        'name.unique' => 'Name already exists.',
        'id_proof.required' => 'ID proof is required.',
        'id_proof.regex' => 'Invalid ID proof format. Only alphabets, numbers, and spaces allowed.',
        'id_proof.unique' => 'ID proof already exists.',
        'email.required' => 'Email is required.',
        'email.email' => 'Invalid email format.',
        'email.unique' => 'Email already exists.',
        'mobile.required' => 'Mobile number is required.',
        'mobile.numeric' => 'Mobile number must be numeric.',
        'mobile.digits' => 'Mobile number must be exactly 10 digits.',
        'mobile.unique' => 'Mobile number already exists.',
        'password.required' => 'Password is required.',
        'profile_picture.image' => 'Invalid image format.',
        'profile_picture.mimes' => 'Allowed image formats: jpeg, png, jpg, gif.',
        'profile_picture.max' => 'Maximum file size allowed is 2MB.',
    ]);

    if ($validator->fails()) {
        $errors = $validator->errors();
        return response()->json(['errors' => $errors->toArray()], 422);
    }

    try {
        $guest = Guest::create([
            'name' => $request->name,
            'id_proof' => $request->id_proof,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            // Include other fields as needed
        ]);

        // Logic to handle profile picture upload if present
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            // Your image upload logic here
        }

        // Check if the guest was created successfully
        if ($guest) {
            // Send the welcome email
            Mail::to($guest->email)->send(new WelcomeEmail($guest));

            return response()->json(['success' => 'Registration successful!'], 200);
        } else {
            return response()->json(['error' => 'Registration failed. Please try again.'], 500);
        }
    } catch (\Throwable $th) {
        return response()->json(['error' => 'Something went wrong'], 500);
    }
}
public function verifyOTP(Request $request)
{
    $this->validate($request, [
        'email' => 'required|email',
        'otp' => 'required|numeric',
        'password' => 'required|min:6',
    ]);

    // Retrieve the user by email and OTP
    $guest = Guest::where('email', $request->email)->where('otp', $request->otp)->first();

    if ($guest) {
        // Reset the password and update the OTP
        $guest->password = Hash::make($request->password);
        $guest->otp = null; // Reset OTP
        $guest->save();

        // Redirect to login page or wherever needed
        return response()->json(['success' => true, 'message' => 'Password reset successful Login with new Password.']);
    } else {
        return back()->with('error', 'Invalid OTP. Please try again.');
    }
}

public function initiatePasswordReset(Request $request)
{
    if ($request->isMethod('post')) {
        // Step 1: Validate email, generate OTP, and send it
        $this->validate($request, [
            'email' => 'required|email|exists:guests,email',
        ]);

        $otp = mt_rand(100000, 999999);

        $guest = Guest::where('email', $request->email)->first();
        $guest->otp = $otp;
        $guest->save();

        try {
            // Send OTP via mail
            Mail::to($request->email)->send(new PasswordResetMail($otp));

            return response()->json(['success' => true, 'email' => $request->email]);
        } catch (\Exception $e) {
            Log::error("Email error: " . $e->getMessage());
            return response()->json(['error' => 'Email error:' . $e->getMessage()]);
          }
        }


    // Step 2: Validate OTP and set new password
    $this->validate($request, [
        'email' => 'required|email',
        'otp' => 'required|numeric',
        'password' => 'required|min:6',
    ]);

    $guest = Guest::where('email', $request->email)->where('otp', $request->otp)->first();

    if ($guest) {
        $guest->password = Hash::make($request->password);
        $guest->otp = null;
        $guest->save();

        return response()->json(['success' => true, 'message' => 'Password reset successful.']);
    } else {
        return response()->json(['error' => 'Invalid OTP. Please try again.']);
    }
}public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication successful
        $user = Auth::user(); // Get the authenticated user
        return redirect('/index')->with('success', 'Login successful!'); // Pass success message
    }

    return redirect()->back()->with('error', 'Login failed. Check your credentials.');
}
public function logout()
{
    if (Auth::check()) {
        Auth::logout();
        return redirect('/index')->with('success', 'Logged out successfully');
    }

    return redirect('/index')->with('error', 'No user is logged in');
}
 public function handlePayment(Request $request)
{
    $stripeSecretKey = env('STRIPE_SECRET_KEY');
    Stripe::setApiKey($stripeSecretKey);

    try {
        $paymentIntent = PaymentIntent::create([
            'amount' => $request->total_price * 100, // amount in cents
            'currency' => 'inr', // Use 'inr' for Indian Rupees
        ]);

        return view('stripe.payment', ['clientSecret' => $paymentIntent->client_secret]);
    } catch (\Exception $e) {
        return back()->with('error', $e->getMessage());
    }
}

public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();
}
public function handleGoogleCallback()
{
    try {
        $user = Socialite::driver('google')->user();
    } catch (\Exception $e) {
        return redirect('/index')->with('error', 'Google Sign Up failed');
    }

    // Check if the user already exists in the database
    $existingUser = Guest::where('email', $user->email)->first();

    if ($existingUser) {
        // User exists, attempt to authenticate
        $credentials = ['email' => $user->email, 'password' => $user->email]; // Using the email as the password

        if (Auth::attempt($credentials)) {
            // Authentication successful
            $authenticatedUser = Auth::user();
            return redirect('/index')->with('user', $authenticatedUser)->with('success', 'Google Sign In successful!');
        } else {
            return redirect('/index')->with('error', 'Google Sign In failed. Please try again.');
        }
    }

    // If the user doesn't exist, create a new user
    try {
        DB::beginTransaction();

        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'profile_picture' => $user->avatar,
            'password' => Hash::make($user->email), // Hashing the user's email as password
        ];

        $newUser = Guest::create($data);

        DB::commit();

        if ($newUser) {
            // Log in the newly created user
            $credentials = ['email' => $user->email, 'password' => $user->email];

            if (Auth::attempt($credentials)) {
                // Authentication successful
                $authenticatedUser = Auth::user();
                return redirect('/user')->with('user', $authenticatedUser)->with('success', 'Google Sign Up successful!');
            }
        }

        return redirect('/')->with('error', 'Google Sign Up failed. Please try again.');
    } catch (\Throwable $th) {
        DB::rollBack();
        return redirect('/')->with('error', 'Something went wrong');
    }
}

public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'check_in_date' => 'required',
            'check_out_date' => 'required',
            'room_type' => 'required',
            'total_price' => 'required',
        ]);

        // Retrieve the necessary data from the request
        $guestId = $request->input('guest_id');
        $roomType = $validatedData['room_type'];
        $totalPrice = $validatedData['total_price'];

        // Find a room of the selected room type
        $room = Room::whereHas('roomType', function ($query) use ($roomType) {
            $query->where('name', $roomType);
        })->first();

        // Check for room availability
        if (!$room) {
            return back()->with('error', 'No rooms available for the selected type.');
        }
        $userId = Auth::user()->id;
        // Check for existing bookings for the selected room and dates
        $existingBooking = Booking::where('room_number', $room->room_no)
            ->where(function ($query) use ($validatedData) {
                $query->whereBetween('check_in_date', [$validatedData['check_in_date'], $validatedData['check_out_date']])
                    ->orWhereBetween('check_out_date', [$validatedData['check_in_date'], $validatedData['check_out_date']])
                    ->orWhere(function ($q) use ($validatedData) {
                        $q->where('check_in_date', '<=', $validatedData['check_in_date'])
                            ->where('check_out_date', '>=', $validatedData['check_out_date']);
                    });
            })
            ->first();

        // If there's an existing booking, prevent creating a new one
        if ($existingBooking) {
            return back()->with('error', 'The room is already booked for the selected dates.');
        }

        // Create a new booking
        $booking = new Booking();
        $booking->guest_id = $userId;
        $booking->room_type = $roomType;
        $booking->room_number = $room->room_no; // Assign the room number
        $booking->check_in_date = $validatedData['check_in_date'];
        $booking->check_out_date = $validatedData['check_out_date'];
        $booking->total_price = $totalPrice;
        $booking->save();

        if ($booking) {
            // If Razorpay payment is chosen
            if ($request->input('payment_method') === 'online') {
                $keyId = env('RAZORPAY_KEY'); // Replace with your actual Razorpay key
                $keySecret = env('RAZOR_SECRET'); // Replace with your actual Razorpay secret

                // Create an order with Razorpay
                $razorpay = new \Razorpay\Api\Api($keyId, $keySecret);
                $orderData = [
                    'receipt' => 'order_' . $booking->id,
                    'amount' => $totalPrice * 100, // Amount in paise
                    'currency' => 'INR',
                    'payment_capture' => 1 // Auto capture
                    // Add other necessary data as per your requirements
                ];
                $order = $razorpay->order->create($orderData);

                // Store the order ID and other payment details in the Payment record
                $payment = new Payment();
                $payment->total_amount = $totalPrice;
                $payment->payment_date = now();
                $payment->method = 'razorpay';
                $payment->booking_id = $booking->id;
                // $payment->order_id = $order['id']; // Save Razorpay order ID with the payment record
                $payment->save();

                // Return the Razorpay order details to the frontend for payment handling
                return back()->with('success', ' Payment and Booking successful!');
            }

            return back()->with('success', 'Booking successful!');
        } else {
            return back()->with('error', 'Failed to create a booking record.');
        }
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        // dd($e);
        return back()->with('error', 'An error occurred while processing your request.');
    }
}
public function roomSchedule($roomId)
{
    $room = Room::findOrFail($roomId);
    $bookings = Booking::where('room_number', $room->room_no)->get();
    $admin = session()->get('admin-auth');

    // Generate an array with dates and availability status for the room
    $schedule = [];
    $startDate = Carbon::now(); // You can set your start date here
    $endDate = Carbon::now()->addDays(60); // You can set your end date here

    while ($startDate <= $endDate) {
        $date = $startDate->format('Y-m-d');
        $isAvailable = $this->isRoomAvailable($bookings, $date);
        $schedule[$date] = $isAvailable ? 'Available' : 'Booked';
        $startDate->addDay();
    }

    // Manual pagination of the schedule array
    $perPage = 13;
    $currentPage = request()->input('page', 1);
    $sliceOffset = ($currentPage - 1) * $perPage;
    $paginatedSchedule = array_slice($schedule, $sliceOffset, $perPage, true);

    // Get the total number of pages for pagination links
    $totalPages = ceil(count($schedule) / $perPage);

    return view('user.room_schedule', compact('admin', 'room', 'paginatedSchedule', 'totalPages', 'currentPage'));
}

private function isRoomAvailable($bookings, $date)
{
    foreach ($bookings as $booking) {
        if ($date >= $booking->check_in_date && $date <= $booking->check_out_date) {
            return false;
        }
    }
    return true;
}
public function checkAvailability(Request $request)
{
    try {
        $validatedData = $request->validate([
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'room_type' => 'required',
        ]);

        $roomType = $validatedData['room_type'];

        // Find a room of the selected room type
        $room = Room::whereHas('roomType', function ($query) use ($roomType) {
            $query->where('name', $roomType);
        })->first();

        // Check for room availability
        if (!$room) {
            return response()->json(['available' => false, 'message' => 'No rooms available for the selected type.']);
        }

        // Check for existing bookings for the selected room and dates
        $existingBooking = Booking::where('room_number', $room->room_no)
            ->where(function ($query) use ($validatedData) {
                $query->whereBetween('check_in_date', [$validatedData['check_in_date'], $validatedData['check_out_date']])
                    ->orWhereBetween('check_out_date', [$validatedData['check_in_date'], $validatedData['check_out_date']])
                    ->orWhere(function ($q) use ($validatedData) {
                        $q->where('check_in_date', '<=', $validatedData['check_in_date'])
                            ->where('check_out_date', '>=', $validatedData['check_out_date']);
                    });
            })
            ->first();

        // If there's an existing booking, the room is not available for selected dates
        if ($existingBooking) {
            return response()->json(['available' => false, 'message' => 'The room is already booked for the selected dates.']);
        }

        // Room is available for booking on selected dates
        return response()->json(['available' => true, 'message' => 'Room is available for booking.']);
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return response()->json(['error' => 'An error occurred while processing your request.'], 500);
    }
}

public function checkAvailableRooms(Request $request)
{
    try {
        $validatedData = $request->validate([
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
        ]);

        $checkInDate = $validatedData['check_in_date'];
        $checkOutDate = $validatedData['check_out_date'];

        // Retrieve all rooms that are not booked for the selected dates and have status = 1 (available)
        $availableRooms = Room::where('status', 1)
            ->whereDoesntHave('bookings', function ($query) use ($checkInDate, $checkOutDate) {
                $query->where(function ($q) use ($checkInDate, $checkOutDate) {
                    $q->whereBetween('check_in_date', [$checkInDate, $checkOutDate])
                        ->orWhereBetween('check_out_date', [$checkInDate, $checkOutDate])
                        ->orWhere(function ($innerQuery) use ($checkInDate, $checkOutDate) {
                            $innerQuery->where('check_in_date', '<=', $checkInDate)
                                ->where('check_out_date', '>=', $checkOutDate);
                        });
                });
            })
            ->with(['roomType' => function ($query) {
                $query->with(['hotel' => function ($q) {
                    $q->select('id', 'name', 'stars','city'); // Adjust fields as needed
                    $q->with('images'); // Load hotel images relationship
                            }]);
            }])

            ->get(); // Load roomType, hotel, and hotel_images relationships

        // Check existing booking for each available room
        foreach ($availableRooms as $key => $room) {
            $existingBooking = Booking::where('room_number', $room->room_no)
                ->where(function ($query) use ($validatedData) {
                    $query->whereBetween('check_in_date', [$validatedData['check_in_date'], $validatedData['check_out_date']])
                        ->orWhereBetween('check_out_date', [$validatedData['check_in_date'], $validatedData['check_out_date']])
                        ->orWhere(function ($q) use ($validatedData) {
                            $q->where('check_in_date', '<=', $validatedData['check_in_date'])
                                ->where('check_out_date', '>=', $validatedData['check_out_date']);
                        });
                })
                ->first();

            // If an existing booking is found, remove the room from the available rooms list
            if ($existingBooking) {
                unset($availableRooms[$key]);
            }
        }
        if (auth()->check()) {
            // If the user is authenticated, retrieve wishlist data
            $userWishlist = Wishlist::where('guest_id', auth()->user()->id)->pluck('hotel_id')->toArray();
        } else {
            // If the user is not authenticated, set wishlist to an empty array
            $userWishlist = [];
        }

        // Pass the updated available rooms data to the new page along with room types, hotels, and hotel_images
        return view('user.avialablehotels', compact('userWishlist'))->with('availableRooms', $availableRooms  );


    } catch (\Exception $e) {
        Log::error($e->getMessage());

        return response()->json(['error' => 'An error occurred while processing your request.'], 500);
    }
}

// public function showAvailableRooms() {
//     $availableRooms = session('availableRooms');

//     // Fetching all available rooms' details and associated images
//     $availableRoomData = [];

//     foreach ($availableRooms as $room) {
//         $roomType = RoomType::find($room->id);

//         if ($roomType) {
//             $roomImages = RoomImages::where('room_type_id', $room->id)->get();

//             // Add room details and images to available room data array
//             $availableRoomData[] = [
//                 'roomType' => $roomType,
//                 'roomImages' => $roomImages,
//             ];
//         }
//     }

//     // Pass the available rooms' data to the view
//     return view('user.avialableroom')->with('availableRoomData', $availableRoomData);
// }
public function about(){
    return view('user.about');
}
public function cart(Request $request)
{
    try {
        $validatedData = $request->validate([
            'check_in_date' => 'required',
            'check_out_date' => 'required',
            'room_type' => 'required',
            'total_price' => 'required',
        ]);

        // You can set the guest_id as needed, e.g., Auth::id()
        $guestId = $request->input('guest_id');

        // Retrieve the room type from the request
        $roomType = $validatedData['room_type'];

        // Find a room of the selected room type
        $room = Room::whereHas('roomType', function ($query) use ($roomType) {
            $query->where('name', $roomType);
        })->first();

        if (!$room) {
            return back()->with('error', 'No rooms available for the selected type.');
        }

        // Check if the room is already booked for the given dates
        $existingBooking = Booking::where('room_number', $room->room_no)
            ->where(function ($query) use ($validatedData) {
                $query->whereBetween('check_in_date', [$validatedData['check_in_date'], $validatedData['check_out_date']])
                    ->orWhereBetween('check_out_date', [$validatedData['check_in_date'], $validatedData['check_out_date']])
                    ->orWhere(function ($q) use ($validatedData) {
                        $q->where('check_in_date', '<=', $validatedData['check_in_date'])
                            ->where('check_out_date', '>=', $validatedData['check_out_date']);
                    });
            })
            ->first();

        if ($existingBooking) {
            return back()->with('error', 'The room is already booked for the selected dates.');
        }

        // Create a new booking and associate it with the room and guest
        $booking = new Cart();
        $booking->guest_id = $guestId;
        $booking->room_type = $roomType;
        // Room number assignment logic removed
        $booking->check_in_date = $validatedData['check_in_date'];
        $booking->check_out_date = $validatedData['check_out_date'];
        $booking->total_price = $validatedData['total_price'];
        $booking->save();

        if ($booking) {
            return back()->with('success', 'Booking added to cart!');
        } else {
            return back()->with('error', 'Failed to add booking to cart.');
        }
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return back()->with('error', 'An error occurred while processing your request.');
    }
}

public function bookingHistory()
{
    $user = Auth::user();

    // Retrieve the guest's booking history along with hotel data
    $upcomingBookings = Booking::where('guest_id', $user->id)
        ->whereDate('check_out_date', '>=', now()) // Filter upcoming bookings
        ->with(['roomType.hotel']) // Assuming the relation is named 'roomType' in the Booking model and 'hotel' in RoomType model
        ->get();

    $pastBookings = Booking::where('guest_id', $user->id)
        ->whereDate('check_out_date', '<', now()) // Filter past bookings
        ->with(['roomType.hotel']) // Assuming the relation is named 'roomType' in the Booking model and 'hotel' in RoomType model
        ->get();

    return view('user.booking', compact('pastBookings', 'upcomingBookings'));
}
public function cart_view()
{
    // Retrieve wishlist data with associated hotel details for the authenticated user
    $wishlistWithHotels = Wishlist::where('guest_id', auth()->user()->id)
        ->with('hotel.images')
        ->get();

    // Retrieve hotel IDs in the user's wishlist
    $userWishlist = Wishlist::where('guest_id', auth()->user()->id)
        ->pluck('hotel_id')
        ->toArray();

    return view('user.cart', ['wishlistWithHotels' => $wishlistWithHotels, 'userWishlist' => $userWishlist]);
}
public function delete($id)
{
    try {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect()->back()->with('success', 'Item deleted successfully');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to delete item');
    }
}
public function cart_booking($cartId){
    $roomTypes = RoomType::all(); // Retrieve room types
    $rooms = Room::all(); // Retrieve room information
    $user = Auth::user();

    // Fetch the cart details for the authenticated user with the provided cart ID
    $cart = Cart::where('guest_id', $user->id)
                ->where('id', $cartId)
                ->first();

    // Pass the $cart data to the view
    return view('user.cart_booking', compact('cart', 'rooms', 'user', 'roomTypes'));
}

public function edit()
{
    $user = Auth::user();
    $upcomingBookings = Booking::where('guest_id', $user->id)
        ->whereDate('check_out_date', '>=', now()) // Filter upcoming bookings
        ->get();

    $pastBookings = Booking::where('guest_id', $user->id)
        ->whereDate('check_out_date', '<', now()) // Filter past bookings
        ->get();



// Get the current date/time

    // Separate bookings into past and upcoming based on the current date

    return view('user.profile_edit', compact('user', 'pastBookings', 'upcomingBookings'));
}
public function UploadImage($storage, $path, $image)
    {

      if (count(array($image)) > 0) {
        $new_name_of_profile_photo = uniqid('', true) . "." . $image->getClientOriginalExtension();
        $image->move($storage, $new_name_of_profile_photo);
        return $path . '/' . $new_name_of_profile_photo;
      } else {
      }
    }

public function update(Request $request)
{
    try {
        // Validation rules for updating profile
        $rules = [
            'name' => ['required', 'regex:/^[a-zA-Z ]*$/', 'not_regex:/\d/', 'max:255'], // Only letters and spaces, no numbers
            'email' => ['required', 'email', 'unique:users,email,' . Auth::id()],
            'mobile' => ['required', 'numeric', 'digits:10'],
        ];

        // Custom error messages for each rule
        $customMessages = [
            'name.required' => 'Name is required.',
            'name.regex' => 'Name should only contain letters and spaces.',
            'name.not_regex' => 'Name should not contain numbers or special characters.',
            'name.max' => 'Name should not exceed 255 characters.',
            'email.required' => 'Email is required.',
            'email.email' => 'Invalid email format.',
            'email.unique' => 'This email is already in use.',
            'mobile.required' => 'Mobile number is required.',
            'mobile.numeric' => 'Mobile number should be numeric.',
            'mobile.digits' => 'Mobile number should be 10 digits.',
        ];

        if ($request->hasFile('profile_picture')) {
            $rules['profile_picture'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4098';
        }

        $this->validate($request, $rules, $customMessages);

        DB::beginTransaction();

        $user = Auth::user();

        // Update the user's attributes
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->mobile = $request->input('mobile');

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            if ($image->isValid()) {
                $imagePath = $this->UploadImage('Cms/Roomimage', '', $image);
                if ($imagePath) {
                    $user->profile_picture = $imagePath;
                } else {
                    DB::rollBack();
                    return back()->with('error', 'Image upload failed.');
                }
            } else {
                DB::rollBack();
                return back()->with('error', 'Invalid image format or size.');
            }
        }

        $user->save(); // Save the user model

        DB::commit();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    } catch (ValidationException $e) {
        $errors = $e->validator->getMessageBag()->toArray();
        $errorMessages = [];
        foreach ($errors as $fieldErrors) {
            foreach ($fieldErrors as $errorMessage) {
                $errorMessages[] = $errorMessage;
            }
        }
        return back()->with('errors', $errorMessages);
    } catch (\Throwable $th) {
        DB::rollBack();
        Log::error($th);
         // Log the error
        return back()->with('error', 'Something went wrong. Please try again later.');
    }
}
public function editProfilePicture(Request $request)
{
    try {
        $rules = [
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4098',
        ];

        $customMessages = [
            'profile_picture.required' => 'Profile picture is required.',
            'profile_picture.image' => 'Invalid image format.',
            'profile_picture.mimes' => 'Supported formats: jpeg, png, jpg, gif, svg.',
            'profile_picture.max' => 'Maximum file size exceeded (4MB).',
        ];

        $this->validate($request, $rules, $customMessages);

        DB::beginTransaction();

        $user = Auth::user();

        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            if ($image->isValid()) {
                $imagePath = $this->UploadImage('Cms/Roomimage', '', $image);
                if ($imagePath) {
                    $user->profile_picture = $imagePath;
                    $user->save(); // Save the updated profile picture path
                    DB::commit();
                    return redirect()->route('profile.edit')->with('success', 'Profile picture updated successfully.');
                } else {
                    DB::rollBack();
                    return back()->with('error', 'Image upload failed.');
                }
            } else {
                DB::rollBack();
                return back()->with('error', 'Invalid image format or size.');
            }
        }

        DB::rollBack();
        return back()->with('error', 'No profile picture uploaded.');
    } catch (ValidationException $e) {
        $errors = $e->validator->getMessageBag()->toArray();
        $errorMessages = [];
        foreach ($errors as $fieldErrors) {
            foreach ($fieldErrors as $errorMessage) {
                $errorMessages[] = $errorMessage;
            }
        }
        return back()->with('errors', $errorMessages);
    } catch (\Throwable $th) {
        DB::rollBack();
        Log::error($th); // Log the error
        return back()->with('error', 'Something went wrong. Please try again later.');
    }
}

public function cancelBooking($id)
{
    $booking = Booking::find($id);

    if (!$booking) {
        return redirect()->back()->with('error', 'Booking not found.');
    }

    $booking->delete();

    return redirect()->back()->with('success', 'Booking cancelled successfully.');
}
public function handleGet(){
    return view('user.pay');
}

public function hotel()
{
    $hotels = Hotel::where('status', 1)->with('state', 'city', 'images')->get();
    $states = State::all();
    $cities = City::all();
            // Check if the user is authenticated
            if (auth()->check()) {
                // If the user is authenticated, retrieve wishlist data
                $userWishlist = Wishlist::where('guest_id', auth()->user()->id)->pluck('hotel_id')->toArray();
            } else {
                // If the user is not authenticated, set wishlist to an empty array
                $userWishlist = [];
            }

    return view('user.hotel_view', compact('hotels', 'states', 'cities','userWishlist'));
}
public function hotel_singal($id)
{
    $roomImages = RoomImages::where('room_type_id', $id)->get();

    $hotel = Hotel::findOrFail($id);
    // Load associated hotel images
    $hotel->load('images');

    // Fetch the state and city information using their IDs
    $state = State::find($hotel->state);
    $city = City::find($hotel->city);

    $roomTypes = RoomType::where('hotel_id', $id)->get();

    return view('user.hotel_singal', compact('hotel', 'roomImages', 'roomTypes', 'state', 'city'));
}
public function addToWishlist(Request $request)
{
    try {
        if (!Auth::check()) {
            throw new \Exception("Please log in first");
        }

        $userId = Auth::user()->id;

        $hotelId = $request->input('hotel_id');

        if (!$hotelId) {
            throw new \Exception("Invalid hotel ID");
        }

        // Check if the hotel is already in the wishlist for this user
        $wishlistItem = Wishlist::where('guest_id', $userId)->where('hotel_id', $hotelId)->first();

        if ($wishlistItem) {
            // Hotel is already in the wishlist, so remove it
            $wishlistItem->delete();
            return response()->json(['success' => 'Hotel removed from wishlist successfully']);
        } else {
            // Hotel is not in the wishlist, add it
            $wishlist = new Wishlist();
            $wishlist->guest_id = $userId;
            $wishlist->hotel_id = $hotelId;
            $wishlist->save();

            return response()->json(['success' => 'Hotel added to wishlist successfully']);
        }
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()]);
    }
}
public function contact(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'full_name' => 'required',
        'email' => 'required|email',
        'contact_number' => 'required',
        'message' => 'required',
    ]);

    // Assuming you have an authenticated user, associate the guest_id


    // Create a new ContactUs instance and associate it with the guest_id
    $contact = ContactUs::create([

        'full_name' => $validatedData['full_name'],
        'email' => $validatedData['email'],
        'contact_number' => $validatedData['contact_number'],
        'message' => $validatedData['message'],
    ]);

    // Handle success or failure (redirect or response)
    // For example:
    return redirect()->back()->with('success', 'Form submitted successfully!');
}
public function go($hotelId)
{
    $hotel = Hotel::with([
            'roomTypes.rooms' => function ($query) {
                $query->where('status', 1);
            }
        ])
        ->where('id', $hotelId)
        ->firstOrFail();

    return view('user.pay', compact('hotel'));
}




}







