<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Whishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{
    public function index()
    {      
        // featured Products
        $products = Product::where('is_featured','Yes')
                                    ->orderBy('id','DESC')
                                    ->where('status',1)
                                    ->where('type','manufactured_material')
                                    ->take(8)
                                    ->get();
        $data['featuredProducts'] = $products;
        
        // latest Products
        $latestProducts = Product::orderBy('id','DESC')
                                    ->where('status',1)
                                    ->where('type','manufactured_material')
                                    ->take(8)
                                    ->get();
        $data['latestProducts'] = $latestProducts;

        $categories = Category::where('showHome','Yes')
        ->orderBy('id','DESC')
        ->where('status',1)
        ->take(4)
        ->get();
        $data['categories'] = $categories;
        return view('front.home',$data);
    }



    public function addToWhishlist(Request  $request)
    {
        if(Auth::check() == false)
        {

            session(['url.intended' => url()->previous()]);

            return response()->json([
                'status' => false,
            ]);
        }
        $porduct = Product::where('id', $request->id)->first();
       
        if($porduct == NULL)
        {
            return response()->json([
                'status' => true,
                'message' => ' <div class="alert alert-success"> Product not found .</div>',
            ]);
        }
        
        Whishlist::updateOrCreate(
            [
                'user_id' => Auth::user()->id,
                'product_id' => $request->id,
            ],
            [
                'user_id' => Auth::user()->id,
                'product_id' => $request->id,
            ]
        );
        
        // $wishlist = new Whishlist;
        // $wishlist->user_id = Auth::user()->id;
        // $wishlist->product_id = $request->id;
        // $wishlist->save();
        
        return response()->json([
            'status' => true,
            'message' => ' <div class="alert alert-success"><strong>"'.$porduct->title.'"</strong> added in your Whishlist.</div>',
        ]);
    }

    public function aboutUs()
    {
        return view('front.about');
    }
    public function contactUs()
    {
        return view('front.contact');
    }

    public function contactStore(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            
        ]);

        if($validator->passes())
        {
            $contact = new Contact;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->mobile = $request->mobile;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->save();

            $request->session()->flash('success','Your Message send successfully');
            
            return response()->json([
                'status' => true,
                'message' => 'Your Message send successfully'
            ]); 
        }
        else
        {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]); 
        }
    }
}
