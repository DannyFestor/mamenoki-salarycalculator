<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\School;

class EditController extends Controller
{
    public function __invoke(School $school)
    {
        return view('schools.edit', [
            'school' => $school
        ]);
    }
}
