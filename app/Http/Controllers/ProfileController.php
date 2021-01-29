<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function dashboard(){
        $userId = Auth::id();

        $userOrders = Order::where('user_id', $userId)->orderByDesc('created_at')->get();
        $orders = Order::orderBy('created_at', 'desc')->get();

        return view('dashboard')->with(['userOrders' => $userOrders, 'orders' => $orders]);
    }
}
