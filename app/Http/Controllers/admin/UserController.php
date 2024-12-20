<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::latest();
        
        if(!empty($request->get('keyword')))
        {
            $users = $users->where('name','like','%'.$request->get('keyword').'%');
            $users = $users->orWhere('email','like','%'.$request->get('keyword').'%');
            $users = $users->orWhere('phone','like','%'.$request->get('keyword').'%');
        }
        
        $users = $users->paginate(10);

        $data['users'] = $users;
        return view('admin.users.list',$data); 
    }

    public function create(Request $request)
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required',
        ]);

            if($validator->passes())
            {
                $user = new User;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->status = $request->status;
                $user->role = $request->role;
                $user->phone = $request->phone;
                $user->save();

                $message = 'User Added successfully';
                session()->flash('success',$message);
                return response()->json([
                    'status' => true,
                    'message' => $message,
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

    
    public function edit(Request $request,$id)
    {
        $user = User::find($id);

        if($user == null)
        {
            $message = 'User Not found';
            session()->flash('error',$message);
            return redirect()->route('users.index');
        }
        $data['user'] = $user;
        return view('admin.users.edit',$data);
    }

    public function update(Request $request ,$id)
    {
        $user = User::find($id);

        if($user == null)
        {
            $message = 'User Not found';
            session()->flash('error',$message);

            return response()->json([
                'status' => false,
                'message' => $message,
            ]);
            
        }

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            // 'email' => 'required|email|unique:users',
            'email' => 'required|email|unique:users,email,'.$id.',id',
            'phone' => 'required',
        ]);

        

            if($validator->passes())
            {
                $user->name = $request->name;
                $user->email = $request->email;

                if($request->password != '')
                {
                    $user->password = Hash::make($request->password);
                }
                $user->status = $request->status;
                $user->role = $request->role;
                $user->phone = $request->phone;
                $user->save();

                $message = 'User Updated successfully';
                session()->flash('success',$message);
                return response()->json([
                    'status' => true,
                    'message' => $message,
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

    public function destroy(Request $request,$id)
    {   
        $user = User::find($id);

        if($user == null)
        {
            $message = 'User Not found';
            session()->flash('error',$message);

            return response()->json([
                'status' => false,
                'message' => $message,
            ]);
        }

        $user->delete();

            $message = 'User Deleted Successfully';
            session()->flash('success',$message);

            return response()->json([
                'status' => true,
                'message' => $message,
            ]);
    }
}
