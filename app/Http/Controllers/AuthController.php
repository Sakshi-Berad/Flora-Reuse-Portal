<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Whishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login()
    {
        return view('front.account.login');
    }
    
    public function register()
    {
        return view('front.account.register');
    }

    public function processRegister(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed',
            'role' => 'required'
        ]);

        if($validator->passes())
        {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->role = $request->role;
            $user->password = Hash::make($request->password);
            $user->save();

            session()->flash('success','You have been registered successfully');

            return response()->json([
                'status' => true,
            ]);
        }
        else
        {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

    public function authenticate(Request $request)
    {
        $request->session()->flush();
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->passes())
        {
            if(Auth::attempt(['email'=> $request->email, 'password'=> $request->password],$request->get('remmeber')))
            {
                // dd(session()->has('url.intended'));
             
                if(session()->has('url.intended')){
                    return redirect(session()->get('url.intended'));
                }

                return redirect()->route('account.profile');
            }
            else
            {
                return redirect()->route('account.login')->withInput($request->only('email'))
                                                         ->with('error', 'Either email or password is incorrect');
            }
        }
        else
        {
            return redirect()->route('account.login')
                                      ->withErrors($validator)
                                      ->withInput($request->only('email'));
        }
    }

    public function profile()
    {
        $userId = Auth::user()->id;
        $user = User::where('id',$userId)->first();
        $data['user'] = $user;
        

        $countries = Country::orderBy('name', 'ASC')->get();
        $data['countries'] = $countries;

        $address = CustomerAddress::where('id',$userId)->first();
        $data['address'] = $address;

        return view('front.account.profile',$data);
    }
 
    // update users profile 
    public function updateProfile(Request $request)
    {
        $userId = Auth::user()->id;
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$userId.',id',
            'phone' => 'required',
        ]);

        if($validator->passes())
        {
            $user = User::find($userId);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->save();

            session()->flash('success','Profile updated successfully... ');
            return response()->json([
                'status' => true,
                'message' => 'Profile updated successfully... ',
            ]);
        }
        else
        {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

     // update users addresses 
     public function updateAddress(Request $request)
     {
         $userId = Auth::user()->id;
         $validator = Validator::make($request->all(),[
            'first_name' => 'required|min:3',
            'last_name' => 'required',
            'email' => 'required|email',
            'country_id' => 'required',
            'address' => 'required|min:10',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'mobile' => 'required',
        ]);
 
         if($validator->passes())
         {
            //  $user = User::find($userId);
 
            //  $user->name = $request->name;
            //  $user->email = $request->email;
            //  $user->phone = $request->phone;
            //  $user->save();

            CustomerAddress::updateOrCreate(
                ['user_id' =>  $userId],
                [
                    'user_id' =>  $userId,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'mobile' => $request->mobile,
                    'country_id' => $request->country_id,
                    'address' => $request->address,
                    'appartment' => $request->appartment,
                    'city' => $request->city,
                    'state' => $request->state,
                    'zip' => $request->zip,
                ],
            );
 
             session()->flash('success','Address updated successfully... ');
             return response()->json([
                 'status' => true,
                 'message' => 'Address updated successfully... ',
             ]);
         }
         else
         {
             return response()->json([
                 'status' => false,
                 'errors' => $validator->errors(),
             ]);
         }
     }
       

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('account.login')->with('success', 'You successfully logged out');
    }


    public function orders()
    {
        // show orders for users 

        $users = Auth::user();
        $orders = Order::where('user_id', $users->id)->orderBy('created_at', 'DESC')->get();


        $data['orders'] = $orders;
        return view('front.account.order',$data);
    }

    public function orderDetail($id)
    {
        // echo $id;
        $users = Auth::user();

        $order = Order::where('user_id', $users->id)->where('id',$id)->first();
        $data['order'] = $order;

        $orderItems = OrderItem::where('order_id', $id)->get();
        $data['orderItems'] = $orderItems;
        
        $orderItemsCount = OrderItem::where('order_id', $id)->count();
        $data['orderItemsCount'] = $orderItemsCount;

        return view('front.account.order-detail',$data);

    }

    // whishlist show 
    public function wishlist()
    {
        $Wishlists = Whishlist::where('user_id', Auth::user()->id)->with('product')->get();

        $data['Wishlists'] = $Wishlists;

        return view('front.account.wishlist',$data);

    }


    public function removeProductFromWishlist(Request $request)
    {
        $wishlist = Whishlist::where('user_id', Auth::user()->id)->where('product_id', $request->id)->first();

        if($wishlist == null)
        {
            session()->flash('error', 'Product already removed');
            return response()->json([
                'status' => true
            ]);
        }
        else
        {
            Whishlist::where('user_id', Auth::user()->id)->where('product_id', $request->id)->delete();
            session()->flash('success', 'Product removed successfully');
            return response()->json([
                'status' => true
            ]);

        }
    }

    public function showChangePasswordForm()
    {
        return view('front.account.change-password');
    }

    public function changePassword(Request $request)
    {
        $vallidator = Validator::make($request->all(),[
            'old_password' => 'required',
            'new_password' => 'required|min:5',
            'confirm_password' => 'required|same:new_password',
        ]);


        if($vallidator->passes())
        {
            $user = User::select('id','password')->where('id',Auth::user()->id)->first();

            if(!Hash::check($request->old_password,$user->password))
            {
                session()->flash('error','your old password is incorrect , please try again');
                return response()->json([
                    'status' => true,
                ]);
            }


            
                User::where('id',$user->id)->update([
                    'password' => Hash::make($request->new_password)
                ]);


                session()->flash('success','Changed Your Password successfully');
                return response()->json([
                    'status' => true,
                ]);
        }



        else
        {
            return response()->json([
                'status' => false,
                'errors' => $vallidator->errors(),
            ]);
        }
    }



}
