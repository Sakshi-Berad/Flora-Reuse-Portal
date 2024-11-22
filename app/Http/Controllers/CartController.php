<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\CustomerAddress;
use App\Models\DiscountCoupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ShippingCharge;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {

        $product = Product::with('product_images')->find($request->id);

        if($product == null) 
        {
            return response()->json([
                'status' => false,
                'message' => 'Product not found'
            ]);
        }

        if(Cart::count() > 0)
        {
            // echo "product allready in cart";
            // product found in cart 
            // check if this product allready in cart 
            // return a msg that product allredy in cart 
            // if product is not found in cart then add th product in cart 

            $cartContent = Cart::content();
            $productAllredyExist = false;
            
            foreach ($cartContent as $item) 
            {
                if($item->id == $product->id)
                {
                    $productAllredyExist = true;
                }
            }

            if($productAllredyExist == false)
            {
                Cart::add($product->id, $product->title, 1, $product->price,['productImage' => (!empty($product->product_images)) ? $product->product_images->first() : '']);

                $status = true;
                $message = '<strong>'.$product->title.'</strong> Added in cart successfully';
                session()->flash('success',$message);

            }
            else
            {
                $status = false;
                $message = $product->title.' Already added in cart';

            }
        }
        else
        {
            // cart is empty 
            // echo "cart is empty adding a product in cart";
          
            Cart::add($product->id, $product->title, 1, $product->price,['productImage' => (!empty($product->product_images)) ? $product->product_images->first() : '']);
            $status = true;
            $message = '<strong>'.$product->title.'</strong> Added in cart successfully';
            session()->flash('success',$message);
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
        ]);

    }

    public function cart()
    {
        $cartContent = Cart::content();
        // dd($cartContent);
        $data['cartContent'] = $cartContent;
        return view('front.cart',$data);
    }

    public function updateCart(Request $request)
    {
        $rowId = $request->rowId;
        $qty = $request->qty;
       

        
        $itemInfo = Cart::get($rowId);
        $product = Product::find($itemInfo->id);
        //check qty availabil in stock
        if($product->track_qty == 'Yes')
        {
            if($qty <= $product->qty)
            {
                Cart::update($rowId,$qty);
                $message = 'Cart updated successfully';
                $status = true;
                session()->flash('success',$message);

            }
            else
            {
                $message = 'Requested qty('.$qty.') Not available in stock.';
                $status = false;
                session()->flash('error',$message);

            }
        }
        else
        {
             Cart::update($rowId,$qty);
             $message = 'Cart updated successfully';
             $status = true;
             session()->flash('success',$message);

        }

        return response()->json([
            'status' => $status,
            'message' => $message,
        ]);
    }

    public function deleteItem(Request $request)
    {
        $rowId = $request->rowId;

        $itemInfo = Cart::get($rowId);
        if($itemInfo == null)
        {
            $errorMessage = 'Item not found in cart';
            session()->flash('error',$errorMessage);

            return response()->json([
                'status' => false,
                'message' => $errorMessage,
            ]);
        }

        
        Cart::remove($request->rowId);
        $message = 'Item remove from cart successfully';
        session()->flash('success',$message);

        return response()->json([
            'status' => true,
            'message' => $message,
        ]);
    }


    public function checkout()
    {
        $discount = 0;

        // if cartd is empty redirect to cart page 
        if(Cart::count() == 0)
        {
            return redirect()->route('front.cart');
        }

        // if user is not logged in then redirect to login page
         if(Auth::check() == false)
         { 
            if(!session()->has('url.intended')){
                session([ 'url.intended' => url()->current() ]);  
            }
            // dd(session([ 'url.intended' => url()->current() ]));  
            
            return redirect()->route('account.login'); 
         }

        $customerAddress = CustomerAddress::where('user_id',Auth::user()->id)->first();

        session()->forget('url.intended');
        $countries = Country::orderBy('name','ASC')->get(); 
        $subTotal = Cart::subtotal(2,'.','');

        // Apply discount here 

        if(session()->has('code'))
        {
            $code = session()->get('code');

            if($code->type == 'percent')
            {
                $discount = ($code->discount_amount/100)*$subTotal;
            }
            else
            {
                $discount = $code->discount_amount;

            }
        }

        //  Shipping calculate here 
        if($customerAddress != '')
        {
            $userContry = $customerAddress->country_id;
            $shippingInfo = ShippingCharge::where('country_id',$userContry)->first();
            
            $totalQty = 0;
            $totalShippingCharge = 0;
            $grandTotal = 0;

            foreach (Cart::content() as $item) {
                $totalQty += $item->qty;
            }
            
            // sum problem here     *********************************
            // $totalShippingCharge = $totalQty * $shippingInfo->amount; // per product shipping charge

            $totalShippingCharge = $shippingInfo->amount; // multiple product shipping charges one time
            $grandTotal = ($subTotal-$discount)+$totalShippingCharge;
        }
        else
        {
            $grandTotal = ($subTotal-$discount);
            $totalShippingCharge = 0;
        }
        
        
        $data['countries'] = $countries;
        $data['customerAddress'] = $customerAddress;
        $data['totalShippingCharge'] = $totalShippingCharge;
        $data['grandTotal'] = $grandTotal;
        $data['discount'] = $discount;

        return view('front.checkout',$data);
    }

    public function processCheckout(Request $request)
    {
        //  step 1 validation applying
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|min:3',
            'last_name' => 'required',
            'email' => 'required|email',
            'country' => 'required',
            'address' => 'required|min:10',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'mobile' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'message' => 'Please fix the error',
                'status' => false,
                'errors' => $validator->errors(),
            ]);

        }
       
        //  step 2 save user address

        $user = Auth::user(); 

        CustomerAddress::updateOrCreate(
            ['user_id' => $user->id],
            [
                'user_id' => $user->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'country_id' => $request->country,
                'address' => $request->address,
                'appartment' => $request->appartment,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
            ],
        );

        //  step 3 store data in orders table 

        // dd($request->payment_method);
        if($request->payment_method == 'cod')
        {
            $discountCodeId = NULL;
            $promoCode = '';
            $shipping = 0;
            $discount = 0;
            $subTotal = Cart::subtotal(2,'.','');


            // Apply discount here 
            if(session()->has('code'))
                {
                    $code = session()->get('code');

                    if($code->type == 'percent')
                    {
                        $discount = ($code->discount_amount/100)*$subTotal;
                    }
                    else
                    {
                        $discount = $code->discount_amount;
                    } 

                    $discountCodeId = $code->id;
                    $promoCode = $code->code;

                }

            // calculate shipping 

           $shippingInfo =  ShippingCharge::where('country_id', $request->country)->first();

           $totalQty = 0;
           //dd(Cart::content());
           foreach (Cart::content() as $item) {
            $totalQty += $item->qty; 
            }

            if($shippingInfo != null)
           {
                // $shipping = $totalQty*$shippingInfo->amount;
                $shipping = $shippingInfo->amount;
                $grandTotal = ($subTotal-$discount)+$shipping;
           }
           else
           {
                $shippingInfo =  ShippingCharge::where('country_id', 'rest_of_world')->first();
                // $shipping = $totalQty*$shippingInfo->amount;
                $shipping = $shippingInfo->amount;
                $grandTotal = ($subTotal-$discount)+$shipping;
           }

           
           

            $order =new  Order;
            $order->subtotal = $subTotal;
            $order->shipping = $shipping;
            $order->grand_total = $grandTotal;
            $order->discount = $discount;
            $order->coupon_code_id = $discountCodeId;
            $order->coupon_code = $promoCode;
            $order->payment_status = 'not paid';
            $order->status = 'pending';
            $order->user_id = $user->id;

            if(!empty($item->id)){

                $product=Product::find($item->id);
                $order->seller_id = $product->user_id;

            }else{
                
                $order->seller_id = Null;    
            }
            

            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->email = $request->email;
            $order->mobile = $request->mobile;
            $order->address = $request->address;
            $order->appartment = $request->appartment;
            $order->city = $request->city;
            $order->state = $request->state;
            $order->zip = $request->zip;
            $order->notes = $request->order_notes;
            $order->country_id = $request->country;
            
            $order->save();


            //  step 4 order item store in order items table

            foreach (Cart::content() as $item) {    
                $orderItem = new OrderItem;
                $orderItem->product_id = $item->id;
                $orderItem->order_id = $order->id;
                $orderItem->name = $item->name;
                $orderItem->qty = $item->qty;
                $orderItem->price = $item->price;
                $orderItem->total = $item->price*$item->qty;
                $orderItem->save();

                // update product stock 
                $productData = Product::find($item->id);

                if($productData->track_qty == 'Yes')
                {
                    $currentQty = $productData->qty;
                    $updateQty = $currentQty-$item->qty;
                    $productData->qty = $updateQty;
                    $productData->save();
                }
                
            }




            // Send Order Email 
            orderEmail($order->id,'customer');

            session()->flash('success','You have successfully placed your order');

            Cart::destroy();

            session()->forget('code');

            return response()->json([
                'message' => 'Order saved successfully',
                'orderId' => $order->id,
                'status' => true,
            ]);
        }
        else
        {

        }

        

    }

    public function thankyou($id)
    {
        return view('front.thanks',[
            'id' => $id,
        ]);
    }

    public function getOrderSummery(Request $request)
    {
        $subTotal = Cart::subtotal(2,'.','');
        $discount = 0;
        $discountString = '';

        // Apply discount here 

        if(session()->has('code'))
        {
            $code = session()->get('code');

            if($code->type == 'percent')
            {
                $discount = ($code->discount_amount/100)*$subTotal;
            }
            else
            {
                $discount = $code->discount_amount;

            }
            $discountString = '<div class="mt-4" id="discount-responce">
            <strong>'.session()->get('code')->code.'</strong>
            <a class="btn btn-sm btn-danger" id="remove-discount"><i class="fa fa-times"></i></a>
        </div>';
        }

        
         
        if($request->country_id > 0)
        {
           
           $shippingInfo =  ShippingCharge::where('country_id', $request->country_id)->first();

           $totalQty = 0;
           foreach (Cart::content() as $item) {
                $totalQty += $item->qty; 
            }

           if($shippingInfo != null)
           {
            //    $shippingCharge = $totalQty*$shippingInfo->amount;
                $shippingCharge = $shippingInfo->amount;
                $grandTotal = ($subTotal-$discount)+$shippingCharge;

                return response()->json([
                    'status' => true,
                    'grandTotal' => number_format($grandTotal,2),
                    'discount' => number_format($discount,2),
                    'discountString' => $discountString,
                    'shippingCharge' => number_format($shippingCharge,2),
                ]);
           }
           else
           {
                $shippingInfo =  ShippingCharge::where('country_id', 'rest_of_world')->first();
                // $shippingCharge = $totalQty*$shippingInfo->amount;
                $shippingCharge = $shippingInfo->amount;
                $grandTotal = ($subTotal-$discount)+$shippingCharge;
        
                return response()->json([
                    'status' => true,
                    'grandTotal' => number_format($grandTotal,2),
                    'discount' => number_format($discount,2),
                    'discountString' => $discountString,
                    'shippingCharge' => number_format($shippingCharge,2),
                ]);
           }
        }
        else
        {
            $grandTotal = 0;
            return response()->json([
                'status' => true,
                'grandTotal' => number_format(($subTotal-$discount),2),
                'discount' => number_format($discount,2),
                'discountString' => $discountString,
                'shippingCharge' => number_format(0,2) ,
            ]);
        }
    }

    public function applyDiscount(Request $request)
    {
        // dd($request->code);

        $code = DiscountCoupon::where('code', $request->code)->first();

        if($code == null)
        {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Discount coupon',
            ]);
        }

        //chech if coupon start date is valid or not
        $now = Carbon::now();

        // echo $now->format('Y-m-d H:i:s');

        if($code->starts_at !== "")
        {
             $startDate = Carbon::createFromFormat('Y-m-d H:i:s',$code->starts_at);

             if($now->lt($startDate))
             {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid Discount coupon ',
                ]);
             }
        }

        if($code->expires_at !== "")
        {
             $endDate = Carbon::createFromFormat('Y-m-d H:i:s',$code->expires_at);

             if($now->gt($endDate))
             {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid Discount coupon (Expired)',
                ]);
             }
        }


        
        // max uses check  count coupon code 
        if($code->max_use > 0)
        {
        $couponUsed = Order::where('coupon_code_id',$code->id)->count();

            if($couponUsed >= $code->max_use)
            {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid Discount coupon maximum use',
                ]);
            }
        }
        

        // max uses users check  count coupon code 
        if($code->max_uses_user > 0)
        {
        $couponUsedByUser = Order::where(['coupon_code_id' => $code->id, 'user_id' => Auth::user()->id])->count();
         
            if($couponUsedByUser >= $code->max_uses_user)
            {
            return response()->json([
                'status' => false,
                'message' => 'You already used this coupon',
            ]);
            }
        }
        

        //minimum amount condition check 
        $subTotal = Cart::subtotal(2,'.','');
        
        if($code->min_amount > 0)
        {
            if($subTotal < $code->min_amount)
            {
                return response()->json([
                    'status' => false,
                    'message' => 'Your minimum amount must be ₹'.$code->min_amount.'.',
                ]);
            }
        }


         
        session()->put('code',$code);
        return $this->getOrderSummery($request);
    }


    public function removeCoupon(Request $request)
    {
        session()->forget('code');
        return $this->getOrderSummery($request);
    }
}
