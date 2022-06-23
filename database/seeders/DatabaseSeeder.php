<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Hashing\BcryptHasher;
use App\Models\User;
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
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('admin');
        $user->is_admin = 1;
        $user->save();
    }
}
