<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WorkSituation;
use Carbon\CarbonPeriod;
use Illuminate\Database\Seeder;

class WorkSituationSeeder extends Seeder
{
    public function run(): void
    {
        $payment_dates = CarbonPeriod::create(now()->subYears(2), '1 month', now());
        $users = User::all();

        foreach ($payment_dates->toArray() as $payment_date) {
            $users->each(fn(User $user) => WorkSituation::factory()->for($user)->create([
                'year' => $payment_date->year,
                'month' => $payment_date->month,
                'payment_at' => $payment_date,
            ]));
        }
    }
}
