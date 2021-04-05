<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{
    public function login()
    {
        $fail = "";
        return view('user.login',["fail"=>$fail]);
    }

    public function register()
    {
        $success = "";
        $fail = "";
        return view('user.register',["fail"=>$fail,"success"=>$success]);
    }

    public function loginuser(Request $request)
    {
        $user = User::where(['email'=>$request->email])->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            $fail = 'Email or Password is incorrect';
            return view('user.login',["fail"=>$fail]);
        }
        else{
            $request->session()->put('user',$user);
            return redirect('/');
        }
    }

    public function registeruser(Request $request)
    {
        if(User::where(['email'=>$request->email])->first()){
            $fail = "Email Already Exist";
            $success = "";
            return view('user.register',["fail"=>$fail,"success"=>$success]);
        }
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|max:20',
        ]);

        $userin = new User;
        $userin->name = $request->name;
        $userin->email = $request->email;
        $userin->password = Hash::make($request->password);
        $save = $userin->save();

        if($save){
            $fail = "";
            $success = "User Have Created Successfully";
            return view('user.register',["fail"=>$fail,"success"=>$success]);
        }

    }

    public function logoutuser(){
        Session::forget('user');
        return redirect('login');
    }
}
