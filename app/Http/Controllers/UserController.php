<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(): array
    {
        $users = User::query()
            ->select('users.email', DB::raw('SUM(orders.total) as total_sum'))
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->groupBy('users.id', 'users.email')
            ->havingRaw('SUM(orders.total) < ?', [1000])
            ->get();

        return [
            'users_count' => $users->count(),
            'users'       => $users->toArray(),
        ];
    }
}
