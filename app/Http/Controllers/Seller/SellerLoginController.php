<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SellerLoginController extends Controller
{
    public function index()
    {
        return view('seller.login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->passes())
        {
           
            if(Auth::attempt(['email'=>$request->email, 'password' =>$request->password],$request->get('remember')))
            {
                // $admin = Auth::guard('seller')->user();
                $admin = Auth::user();
                
                if($admin->role==3)
                {                    
                    return redirect()->route('seller.dashboard')->with('success','Admin login successful');
                }
                else
                {
                    Auth::guard('seller')->logout();
                    return redirect()->route('seller.login')->with('error','You are not authorized to access admin pannel.');
                }

            } 
            else
            {
                return redirect()->route('seller.login')->with('error','Either Email or Password is incorrect');
            }
        }
        else
        {
            return redirect()->route('seller.login')->withErrors($validator)->withInput($request->only('email'));
        }
    }

    // public function register()
    // {
    //     return view('admin.register');
    // }


    // public function AdminProcessRegister(Request $request)
    // {
    //     $validator = Validator::make($request->all(),[
    //         'name' => 'required|min:5',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required|min:8|confirmed',
    //     ]);

    //     if($validator->passes())
    //     {
    //         $user = new User;
    //         $user->name = $request->name;
    //         $user->email = $request->email;
    //         $user->phone = $request->phone;
    //         $user->role = 2;
    //         $user->password = Hash::make($request->password);
    //         $user->save();

    //         session()->flash('success','You have been registered successfully');

    //         return response()->json([
    //             'status' => true,
    //         ]);
    //     }
    //     else
    //     {
    //         return response()->json([
    //             'status' => false,
    //             'errors' => $validator->errors(),
    //         ]);
    //     }
    // }

}
