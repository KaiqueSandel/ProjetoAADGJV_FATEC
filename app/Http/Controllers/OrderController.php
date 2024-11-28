<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::paginate(25);
        return view('order/admin/orders', ['orders' => $orders]);
    }

    public function list()
    {
        $user = auth()->user();

        $orders = Order::where('user_id', $user->id)->get();

        return view('order/customer/orders', ['orders' => $orders]);
    }

    public function detail(Order $order)
    {
        return view('order/customer/order_show', ['order' => $order]);
    }
}