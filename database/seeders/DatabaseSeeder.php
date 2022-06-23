<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Hashing\BcryptHasher;
use App\Models\User;
use App\Models\Order;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $user = new User();
        // $user->name = 'Admin';
        // $user->email = 'admin@gmail.com';
        // $user->password = bcrypt('admin');
        // $user->is_admin = 1;
        // $user->save();

        $order = new Order();

        $order->user_id=1;
        $order->date=date('Y-m-d');
        $order->time=date('h:i');
        $order->pizza='traditional';
        $order->small_pizza=1;
        $order->medium_pizza=2;
        $order->large_pizza=3;
        $order->body="This is Testing Order";
        $order->save();
    }
}
