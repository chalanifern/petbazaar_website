<?php

use Illuminate\Support\Facades\Route;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Wishlist;
use App\Models\WishlistItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {

    // 1️⃣ Category -> SubCategories
    $category = Category::find(1);
    //return $category->subCategories; // uncomment to test

    // 2️⃣ SubCategory -> Products
    $subCategory = SubCategory::find(1);
    //return $subCategory->products; // uncomment to testS

    // 3️⃣ Product -> Category, SubCategory
    $product = Product::find(1);
    //return $product->category;
    //return $product->subCategory;

    // 4️⃣ User -> Orders, Cart, Wishlist
    $user = User::find(1);
    //return $user->orders;
    //return $user->cart;
    //return $user->wishlist;

    // 5️⃣ Cart -> CartItems -> Product
    $cart = Cart::find(1);
    //return $cart->cartItems;
    //return $cart->cartItems->first()->product;

    // 6️⃣ Wishlist -> WishlistItems -> Product
    $wishlist = Wishlist::find(1);
    //return $wishlist->wishlistItems;
    //return $wishlist->wishlistItems->first()->product;

    // 7️⃣ Order -> OrderItems -> Product
    $order = Order::find(1);
    //return $order->orderItems;
    //return $order->orderItems->first()->product;

    // 8️⃣ Order -> Payment
     return $order->payment;

});