<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        $orders = Order::latest('orders.created_at')->select('orders.*','users.name','users.email');
        $orders = $orders->leftJoin('users','users.id','orders.user_id');

        if($request->get('keywords') == "")
        { 
            $orders = $orders->where('users.name','like','%'.$request->get('keyword').'%');    
            $orders = $orders->orWhere('users.email','like','%'.$request->get('keyword').'%');    
            $orders = $orders->orWhere('orders.id','like','%'.$request->get('keyword').'%');          
        }

        $orders = $orders->paginate(10);

        $data['orders'] = $orders; 
        return view('admin.orders.list',$data);
    }

    public function detail($orderId)
    {

        $order = Order::select('orders.*','countries.name as categoryName')
                                    ->where('orders.id',$orderId)
                                    ->leftJoin('countries','countries.id','orders.country_id')
                                    ->first();

        $orderItem = OrderItem::where('order_id',$orderId)->get();
        // dd($orderItem);
        $data['order'] = $order; 
        $data['orderItem'] = $orderItem; 
        return view('admin.orders.detail',$data);

    }

    public function changeOrderStatus(Request $request,$orderId)
    {
        $order = Order::find($orderId);

        $order->status = $request->status;
        $order->shipped_date = $request->shipped_date;
        $order->save();

        $mesaage = 'Order status updated successfully';
        session()->flash('success', $mesaage);

        return response()->json([
            'status' => true,
            'message' => $mesaage,
        ]);
    }

    public function sendInvoiceEmail(Request $request, $orderId)
    {
        orderEmail($orderId,$request->userType);

        $mesaage = 'Order email send successfully';
        session()->flash('success', $mesaage);

        return response()->json([
            'status' => true,
            'message' => $mesaage,
        ]);

    }
}
