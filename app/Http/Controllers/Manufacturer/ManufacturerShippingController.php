<?php

namespace App\Http\Controllers\Manufacturer;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\ShippingCharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ManufacturerShippingController extends Controller
{
    public function create()
    {
        $countries =  Country::get();
        $shippingCharges = ShippingCharge::where("seller_id",auth()->user()->id)->select('shipping_charges.*','countries.name')
                            ->leftJoin('countries','countries.id','shipping_charges.country_id')->get();


        // dd($shippingCharges);
        $data['countries'] = $countries;
        $data['shippingCharges'] = $shippingCharges;
        return view('manufacturer.shipping.create',$data);
    }

    public function store(Request $request)
    {

        $validator =  Validator::make($request->all(),[
                'country' => 'required',
                'amount' => 'required|numeric',
        ]);
        if($validator->passes())
        {

            $count = ShippingCharge::where('country_id',$request->country)->count();
            if($count > 0)
            {
                session()->flash('error','Shipping allready added');
                return response()->json([
                    'status' => true,
                ]);
            }

            $shipping = new ShippingCharge;
            $shipping->country_id = $request->country;
            $shipping->amount = $request->amount;
            $shipping->seller_id = auth()->user()->id;
            $shipping->save();

            session()->flash('success','Shipping Added Successfully');

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

    public function edit($id)
    {

        $shippingCharge = ShippingCharge::find($id);

        $countries =  Country::get();
        $data['countries'] = $countries;
        $data['shippingCharge'] = $shippingCharge;

        return view('manufacturer.shipping.edit',$data);

    }

    public function update(Request $request,$id)
    {
        $shipping = ShippingCharge::find($id);

        $validator =  Validator::make($request->all(),[
                'country' => 'required',
                'amount' => 'required|numeric',
        ]);
        if($validator->passes())
        {

            if($shipping == null)
                {
                    session()->flash('error','Shipping not found');
                    return response()->json([
                        'status' => true,
                    ]);
                }

            $shipping->country_id = $request->country;
            $shipping->amount = $request->amount;
            $shipping->save();

            session()->flash('success','Shipping Updated Successfully');

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

    public function destroy($id)
    {
        $shippingCharge = ShippingCharge::find($id);

        if($shippingCharge == null)
        {
            session()->flash('error','Shipping not found');
            return response()->json([
                'status' => true,
            ]);
        }
        
        $shippingCharge->delete();
        session()->flash('success','Shipping Deleted Successfully');
        return response()->json([
            'status' => true,
        ]);



    }
}
