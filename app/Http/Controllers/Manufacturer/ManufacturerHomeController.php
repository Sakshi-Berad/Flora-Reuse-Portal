<?php

namespace App\Http\Controllers\Manufacturer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ManufacturerHomeController extends Controller
{
    public function index()
    {        
        $totalOrders = Order::where('status','!=','cancelled')
        ->where('seller_id',auth()->user()->id)->count();
        $totalProducts = Product::where('user_id',auth()->user()->id)->count();
        $totalCustomers = User::where('role',4)->count();

        $totalSale = Order::where('status','!=','cancelled')
        ->where('seller_id',auth()->user()->id)->sum('grand_total');
        
        // This Month revenue 
        $satrtOfMont = Carbon::now()->startOfMonth()->format('Y-m-d');
        $currentDate = Carbon::now()->format('Y-m-d');

        $saleThisMonth = Order::where('status','!=','cancelled')
        ->where('seller_id',auth()->user()->id)                   
        ->whereDate('created_at','>=',$satrtOfMont)
                            ->whereDate('created_at','<=',$currentDate)
                            ->sum('grand_total');
        
        // last month revenue
        $lastMonthStartData =  Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d');
        $lastMonthEndData =  Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d');
        $lastMonthName = Carbon::now()->subMonth()->startOfMonth()->format('M');

        $SaleLastMonth = Order::where('status','!=','cancelled')
        ->where('seller_id',auth()->user()->id)
        ->whereDate('created_at','>=',$lastMonthStartData)
                            ->whereDate('created_at','<=',$lastMonthEndData)
                            ->sum('grand_total');



        // last 30 days revenue
        $last30DayStartDAte = Carbon::now()->subDays(30)->format('Y-m-d');

        $saleLast30Days = Order::where('status','!=','cancelled')
        ->where('seller_id',auth()->user()->id)                    
        ->whereDate('created_at','>=',$last30DayStartDAte)
                            ->whereDate('created_at','<=',$currentDate)
                            ->sum('grand_total');



        $data['totalOrders'] = $totalOrders;
        $data['totalProducts'] = $totalProducts;
        $data['totalCustomers'] = $totalCustomers;
        $data['totalSale'] = $totalSale;
        $data['saleThisMonth'] = $saleThisMonth;
        $data['SaleLastMonth'] = $SaleLastMonth;
        $data['saleLast30Days'] = $saleLast30Days;
        $data['lastMonthName'] = $lastMonthName;
        return view('manufacturer.dashboard',$data);

        
    }
    public function logout()
    {
        Auth::guard('manufacturer')->logout();
        return redirect()->route('manufacturer.login')->with('success','Seller logout successful');
    }
}
