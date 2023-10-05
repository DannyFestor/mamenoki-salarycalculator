<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserData;
use Illuminate\Database\Seeder;

class UserDataSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        $users->each(fn(User $user) => UserData::factory()->for($user)->create());
    }
}
