<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\User;

class WorkSituationController extends Controller
{
    public function __invoke(School $school, User $user)
    {
        return view('work-situation.index', [
            'school' => $school,
            'user' => $user,
        ]);
    }
}
