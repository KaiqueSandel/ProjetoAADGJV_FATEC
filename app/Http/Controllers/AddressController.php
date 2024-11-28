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

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        return view('address/address_show', ['address' => $address]);
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        $address->delete();

        return redirect()->route('addresses.index')->with('success', 'Address deleted!');
    }
}
