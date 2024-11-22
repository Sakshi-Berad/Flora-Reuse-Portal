<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $contacts = Contact::latest();
        if($request->get('keyword') != "")
        {
           $contacts = $contacts->where('name','like','%'.$request->get('keyword').'%');
           $contacts = $contacts->orWhere('email','like','%'.$request->get('keyword').'%');
           $contacts = $contacts->orWhere('mobile','like','%'.$request->get('keyword').'%');
        }
        $contacts = $contacts-> paginate(10);

        $data['contacts'] = $contacts;

        return view('admin.contact.list',$data);
    }

    public function destroy($id ,Request $request)
    {

        $contact = Contact::find($id);

        if(empty($contact))
        {
            $request->session()->flash('error','Message Not Found');

            return response()->json([
                'status' => true,
                'message' => 'Message Not Found',
            ]);
        }

        $contact->delete();

        $request->session()->flash('success', 'Message Deleted successfully');
        return response()->json([
            'status' => true,
            'message' => 'Message Deleted successfully'
        ]); 

    }
}
