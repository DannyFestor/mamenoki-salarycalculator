<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\School;

class CreateController extends Controller
{
    public function __invoke(School $school)
    {
        return view('user.create', [
            'school' => $school,
        ]);
    }
}
