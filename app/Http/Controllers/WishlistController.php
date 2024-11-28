<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $wishlistItems = Wishlist::where('user_id', $user->id)->get();

        return view('wishlist', ['wishlistItems' => $wishlistItems]);
    }