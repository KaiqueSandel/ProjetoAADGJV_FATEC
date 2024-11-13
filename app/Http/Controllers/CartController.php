<?php

namespace App\Http\Controllers;

use App\Models\CartProduct;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;

class CartController extends Controller
{
    public function showCart()
    {
        if (!auth()->check()) {
            return redirect()->back()->withErrors(['error' => 'Must be logged in to see your shopping cart!']);
        }

        $user = auth()->user();
        $cart = $user->cart();
        $cartProducts = $cart->products()->get();
        $cartTotal = $cart->cartTotal();

        return view('cart', ['cartProducts' => $cartProducts, 'cartTotal' => $cartTotal]);
    }

    public function addOneToCart(Product $product)
    {
        if (!auth()->check()) {
            return redirect()->back()->withErrors(['error' => 'Must be logged in to update your shopping cart!']);
        }

        $user = auth()->user();
        $cart = $user->cart();
        $cartProduct = $cart->products()->where('product_id', $product->id)->first();

        if ($cartProduct) {
            $cartProduct->quantity += 1;
            $cartProduct->save();
            return redirect()->back()->with('success', 'One more added to your shopping cart!');
        } else {
            $cart->products()->create(['product_id' => $product->id, 'quantity' => 1, 'price' => $product->price]);
            return redirect()->back()->with('success', 'Product added to your shopping cart!');
        }
    }

}