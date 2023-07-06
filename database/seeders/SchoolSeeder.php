<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    public function run(): void
    {
        School::factory()->create([
            'name' => '豆の木保育園'
        ]);
        School::factory()->create([
            'name' => 'クレヨンクラブ'
        ]);
    }
}
