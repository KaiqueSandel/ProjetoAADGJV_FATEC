public function index()
{
    $user = auth()->user();

    $wishlistItems = Wishlist::where('user_id', $user->id)->get();

    return view('wishlist', ['wishlistItems' => $wishlistItems]);
}