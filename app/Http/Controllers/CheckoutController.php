<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderDetail;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('product')->get();
        $totalAmount = $cartItems->sum(function($item) {
            return $item->cartQuantity * $item->cartPriceEach;
        });

        return view('checkout.index', compact('cartItems', 'totalAmount'));
    }

    public function process(Request $request)
    {
        // Retrieve cart items for the user
        $cartItems = CartItem::with('product')->get();

        // Calculate total amount
        $totalAmount = $cartItems->sum(function($item) {
            return $item->cartQuantity * $item->cartPriceEach;
        });

        // Create a new order
        $order = new Order();
        $order->orderDate = now();
        $order->orderTotalAmount = $totalAmount;

        // Dummy user ID for now
        $order->userID = 1;

        $order->status = 'In Process';
        $order->save();

        $orderId = $order->id;

        // Create order details
        foreach ($cartItems as $item) {
            $orderDetail = new OrderDetail();
            $orderDetail->orderID = $orderId;
            $orderDetail->productID = $item->productID;
            $orderDetail->orderPriceEach = $item->cartPriceEach;
            $orderDetail->orderQuantity = $item->cartQuantity;
            $orderDetail->save();
        }

        // Clear the cart
        CartItem::truncate();

        // Redirect to a confirmation page
        return redirect()->route('checkout.success');
    }
}