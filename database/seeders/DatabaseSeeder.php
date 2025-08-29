<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\WishlistItem;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();

    // Create categories
    $categories = Category::factory(5)->create();

    // Create subcategories with random category for each
    $subcategories = SubCategory::factory(15)->state(function () use ($categories) {
        return [
            'category_id' => $categories->random()->id,
        ];
    })->create();

    // Create products with random category + subcategory for each
    $products = Product::factory(30)->state(function () use ($categories, $subcategories) {
        return [
            'category_id' => $categories->random()->id,
            'subcategory_id' => $subcategories->random()->id,
        ];
    })->create();

    // Wishlists
    $users->each(function ($user) use ($products) {
        $wishlist = Wishlist::factory()->create([
            'user_id' => $user->id,
        ]);

        WishlistItem::factory(rand(1, 3))->state(function () use ($wishlist, $products) {
            return [
                'wishlist_id' => $wishlist->id,
                'product_id' => $products->random()->id,
            ];
        })->create();
    });

    // Carts
    $users->each(function ($user) use ($products) {
        $cart = Cart::factory()->create([
            'user_id' => $user->id,
        ]);

        CartItem::factory(rand(1, 5))->state(function () use ($cart, $products) {
            return [
                'cart_id' => $cart->id,
                'product_id' => $products->random()->id,
            ];
        })->create();
    });

    // Orders
    $users->each(function ($user) use ($products) {
        $orders = Order::factory(rand(1, 3))->create([
            'user_id' => $user->id,
        ]);

        $orders->each(function ($order) use ($products) {
            $items = OrderItem::factory(rand(1, 3))->state(function () use ($order, $products) {
                return [
                    'order_id' => $order->id,
                    'product_id' => $products->random()->id,
                ];
            })->create();

            $totalAmount = $items->sum(fn($item) => $item->price * $item->quantity);

            Payment::factory()->create([
                'order_id' => $order->id,
                'amount' => $totalAmount,
            ]);
        });
    });
 }
}
