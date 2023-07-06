<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\School;
use App\Models\User;
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

        $schools = School::all();
        $teacherRole = Role::where('slug', '=', 'teacher')->first();

        for ($i = 0; $i < 10; $i++) {
            User::factory()->create(['school_id' => $schools->random()->id]);
        }

        $users = User::whereNot('id', $user->id)->get();
        $users->each(fn (User $user) => $user->roles()->attach($teacherRole));
    }
}
