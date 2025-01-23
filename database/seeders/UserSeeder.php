<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(100)
            ->has(Order::factory()->count(3), 'orders')
            ->create();
    }
}
