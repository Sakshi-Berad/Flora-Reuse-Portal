<?php

namespace App\Http\Controllers\Manufacturer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class ManufacturerOrderController extends Controller
{
    public function index(Request $request)
    {

        $orders = Order::latest('orders.created_at')->select('orders.*', 'users.name', 'users.email');
        $orders = $orders->leftJoin('users', 'users.id', 'orders.user_id')->where('orders.seller_id', auth()->user()->id);


        if ($request->get('keywords') == "") {           
            $orders->where(function ($query) use ($request) {
                $keyword = $request->get('keywords', '');  // Get keyword input
                $query->where('users.name', 'like', '%' . $keyword . '%')
                    ->orWhere('users.email', 'like', '%' . $keyword . '%')
                    ->orWhere('orders.id', 'like', '%' . $keyword . '%');
            });
        }


        $orders = $orders->paginate(10);

        $data['orders'] = $orders;
        return view('manufacturer.orders.list', $data);
    }

    public function detail($orderId)
    {

        $order = Order::select('orders.*', 'countries.name as categoryName')
            ->where('orders.id', $orderId)
            ->leftJoin('countries', 'countries.id', 'orders.country_id')
            ->first();

        $orderItem = OrderItem::where('order_id', $orderId)->get();
        // dd($orderItem);
        $data['order'] = $order;
        $data['orderItem'] = $orderItem;
        return view('manufacturer.orders.detail', $data);

    }

    public function changeOrderStatus(Request $request, $orderId)
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
        orderEmail($orderId, $request->userType);

        $mesaage = 'Order email send successfully';
        session()->flash('success', $mesaage);

        return response()->json([
            'status' => true,
            'message' => $mesaage,
        ]);

    }
}
