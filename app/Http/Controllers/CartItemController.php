<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('product')->get();
        $totalAmount = $cartItems->sum(function($item) {
            return $item->cartQuantity * $item->cartPriceEach;
        });

        return response()->json([
            'cartItems' => $cartItems,
            'totalAmount' => $totalAmount,
        ]);
    }
}
