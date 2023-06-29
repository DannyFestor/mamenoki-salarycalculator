<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(School $school, User $user)
    {
        $user->load('userData');

        return view('user.edit', [
            'school' => $school,
            'user' => $user,
        ]);
    }
}
