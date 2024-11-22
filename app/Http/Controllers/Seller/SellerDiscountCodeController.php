<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\DiscountCoupon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class SellerDiscountCodeController extends Controller
{
    public function index(Request $request)
    {
        $discountCoupons = DiscountCoupon::where("seller_id",auth()->user()->id)->latest();
        if(!empty($request->get('keyword')))
        {
            $discountCoupons = $discountCoupons->where('name','like','%'.$request->get('keyword').'%');
            $discountCoupons = $discountCoupons->orwhere('code','like','%'.$request->get('keyword').'%');
        }
        
        $discountCoupons = $discountCoupons-> paginate(10);
        $data['discountCoupons'] = $discountCoupons; 
        return view('seller.coupon.list',$data);

    }
    public function create()
    {
        return view('seller.coupon.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'code' => 'required',
            'type' => 'required',
            'discount_amount' => 'required|numeric',
            'status' => 'required',
        ]);

        if($validator->passes())
        {
            // starting date must be greaterThan current date

            if(!empty($request->starts_at))
            {
                $now = Carbon::now();

                $satrtAt = Carbon::createFromFormat('Y-m-d H:i:s',$request->starts_at);

                if($satrtAt->lte($now) == true)
                {
                    return response()->json([
                        'status' => false,
                        'errors' => ['starts_at' => 'Start date can not be less than current time. ' ],
                    ]);
                }
            }

            // epairy date must be greater than start date
            

            if(!empty($request->starts_at) && !empty($request->expires_at))
            {
                $expiresAt = Carbon::createFromFormat('Y-m-d H:i:s',$request->expires_at);
                $satrtAt = Carbon::createFromFormat('Y-m-d H:i:s',$request->starts_at);

                if($expiresAt->gt($satrtAt) == false)
                {
                    return response()->json([
                        'status' => false,
                        'errors' => ['expires_at' => 'Expiry date must be greater than start date.' ],
                    ]);
                }
            }




            $discountCode = new DiscountCoupon();
            $discountCode->code = $request->code;
            $discountCode->name = $request->name;
            $discountCode->description = $request->description;
            $discountCode->max_use = $request->max_uses;
            $discountCode->max_uses_user = $request->max_uses_users;
            $discountCode->type = $request->type;
            $discountCode->discount_amount = $request->discount_amount;
            $discountCode->min_amount = $request->min_amount;
            $discountCode->status = $request->status;
            $discountCode->starts_at = $request->starts_at;
            $discountCode->expires_at = $request->expires_at;
            $discountCode->seller_id = auth()->user()->id;
            $discountCode->save();

            $message ='Discount coupon added successfully.';

            session()->flash('success', $message);
             
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

    public function edit(Request $request , $id)
    {
        $coupon = DiscountCoupon::find($id);


        if($coupon == null )
        {
            session()->flash('error', 'Coupon Not Found');
            return redirect()->route('coupons.index');
        }

        $data['coupon'] = $coupon; 
        return view('seller.coupon.edit',$data);
         
    }

    public function update(Request $request, $id)
    {
        $discountCode = DiscountCoupon::find($id);

        if($discountCode == null )
        {
            session()->flash('error', 'Coupon Not Found');
            return response()->json([
                'status' => true,
            ]);
        }

        $validator = Validator::make($request->all(),[
            'code' => 'required',
            'type' => 'required',
            'discount_amount' => 'required|numeric',
            'status' => 'required',
        ]);

        if($validator->passes())
        {
            // starting date must be greaterThan current date

            // if(!empty($request->starts_at))
            // {
            //     $now = Carbon::now();

            //     $satrtAt = Carbon::createFromFormat('Y-m-d H:i:s',$request->starts_at);

            //     if($satrtAt->lte($now) == true)
            //     {
            //         return response()->json([
            //             'status' => false,
            //             'errors' => ['starts_at' => 'Start date can not be less than current time. ' ],
            //         ]);
            //     }
            // }

            // epairy date must be greater than start date
            

            if(!empty($request->starts_at) && !empty($request->expires_at))
            {
                $expiresAt = Carbon::createFromFormat('Y-m-d H:i:s',$request->expires_at);
                $satrtAt = Carbon::createFromFormat('Y-m-d H:i:s',$request->starts_at);

                if($expiresAt->gt($satrtAt) == false)
                {
                    return response()->json([
                        'status' => false,
                        'errors' => ['expires_at' => 'Expiry date must be greater than start date.' ],
                    ]);
                }
            }


            $discountCode->code = $request->code;
            $discountCode->name = $request->name;
            $discountCode->description = $request->description;
            $discountCode->max_use = $request->max_uses;
            $discountCode->max_uses_user = $request->max_uses_users;
            $discountCode->type = $request->type;
            $discountCode->discount_amount = $request->discount_amount;
            $discountCode->min_amount = $request->min_amount;
            $discountCode->status = $request->status;
            $discountCode->starts_at = $request->starts_at;
            $discountCode->expires_at = $request->expires_at;
            $discountCode->save();

            $message ='Discount coupon updated successfully.';

            session()->flash('success', $message);
             
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
    public function destroy(Request $request, $id)
    {
        $discountCode = DiscountCoupon::find($id);

        if($discountCode == null )
        {
            session()->flash('error', 'Coupon Not Found');
            return response()->json([
                'status' => true,
            ]);
        }

        $discountCode->delete();

        session()->flash('success', 'Discount coupon deleted successfully.');
        return response()->json([
            'status' => true,
        ]);

    }
}
