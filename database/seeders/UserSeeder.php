<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $roles = Role::pluck('id')->toArray();
        $user = \App\Models\User::factory()->create([
            'email' => 'danny@festor.info',
        ]);
        $user->roles()->attach($roles);
    }
}
