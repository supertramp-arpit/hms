<?php

namespace App\Http\Controllers\Backend;

use App\Models\AdminLogin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\UserPasswordMail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function addusers(){
        $admin=  session()->get('admin-auth');
        return view('Backend.User.Add',['admin'=>$admin]);
    }

    public function listusers(){
        $admin=  session()->get('admin-auth');
        $user = AdminLogin::orderBy('id','DESC')->paginate(10);
        return view('Backend.User.List',['user'=>$user,'admin'=>$admin]);
    }

    #insert User
    public function insertusers(Request $request){

        $name = $request->name;
        $fname = explode(' ', $name)[0];
        $converted1 = ucfirst($fname);
        $pswrd = $converted1 . '@' . $request->number;
        $rand = rand(0, 999);
        $username = $fname.$rand;

        $users_phone = AdminLogin::where('number', $request->input('number'))->exists();
        if ($users_phone) {
            return redirect()->back()->with(['error' => "This Number is already exist"]);
        }

        $users_email = AdminLogin::where('email', $request->input('email'))->exists();
        if ($users_email) {
            return redirect()->back()->with(['error' => "This EmailAddress is already exist"]);
        }
        $file = Null;
        if ($request->has('image')) {
            $file = $this->UploadImage('Cms/Profile', '', $request->file('image'));
        }

        $data = AdminLogin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($pswrd),
            'number' => $request->number,
            'username'=> $username,
            'type'=>$request->type,
            'image'=> $file
        ]);
        try {
            $name = $request->name;
            $password = $pswrd;
            $message = new UserPasswordMail(ucfirst($name), $password);

            Mail::to($request->email)->send($message);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => "Somthing went wrong"]);
        }
        return redirect()->back()->with(['success'=>"User {$data->name} inserted successfully"]);

    }
public function sendPasswordResetEmail(Request $request)
{
    $user = AdminLogin::where('email', $request->email)->first();

    if (!$user) {
        return redirect()->back()->with(['error' => "User not found"]);
    }

    $token = $user->generatePasswordResetToken();

    try {
        $resetLink = route('password.reset', ['token' => $token]);
        $message = "Click here to reset your password: $resetLink";

        Mail::to($user->email)->send(new ResetPasswordMail($resetLink));
    } catch (\Exception $e) {
        // Log the detailed exception message
        Log::error('Email sending failed: ' . $e->getMessage());

        // Return a detailed error message to the user
        return redirect()->back()->with(['error' => "Something went wrong while sending the email. Please try again later."]);
    }

    return redirect()->back()->with(['success' => "Password reset link sent to your email"]);
}

    public function forgotPasswordForm()
    {
        return view('emails.forget_password');
    }
    public function email()
    {
        return view('emails.reset_password');
    }
    public function showResetForm($token)
    {
        $user = AdminLogin::where('password_reset_token', $token)->first();

        if (!$user) {
            return redirect()->route('password.request')->with(['error' => "Invalid token"]);
        }

        return view('emails.reset_password_form', ['token' => $token, 'email' => $user->email]);
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = AdminLogin::where('email', $request->email)
            ->where('password_reset_token', $request->token)
            ->first();

        if (!$user) {
            return redirect()->route('password.request')->with(['error' => "Invalid token"]);
        }

        $user->password = bcrypt($request->password);
        $user->password_reset_token = null;
        $user->save();

        return redirect('/admin/login')->with(['success' => "Password reset successfully"]);
    }

    public function activeusers($id){
        $data=AdminLogin::find($id);
        $data->status=2;
        $data->save();
        return redirect()->back()->with(['success'=>"{$data->name} Status Change"]);
    }

    public function deactiveusers($id){
        $data=AdminLogin::find($id);
        $data->status=1;
        $data->save();
        return redirect()->back()->with(['success'=>"{$data->name} Status Change"]);
    }


    public function edituser($id){
        $admin=  session()->get('admin-auth');
        $value = AdminLogin::where('id',$id)->first();
        return view('Backend.User.Edit',['value'=>$value,'admin'=>$admin]);
    }

    public function updateusers(Request $request){

        try {
            $data=AdminLogin::find($request->id);
            $fileName = $data->image;
              if ($request->has('image')) {
                $fileName = $this->UploadImage('Cms/Profile', '', $request->file('image'));
              }
            $data->name = $request->first_name;
            $data->email = $request->email;
            $data->number = $request->number;
            $data->type = $request->type;
            $data->image = $fileName;
            $data->save();
            return redirect(url('user-list'))->with(['success'=>"User {$data->name} Updated successfully"]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with(['error' => "something went wrong"]);
        }

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
}
