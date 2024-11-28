<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $addresses = Address::where('user_id', $user->id)->get();

        return view('address/addresses', ['addresses' => $addresses]);
    }

}
