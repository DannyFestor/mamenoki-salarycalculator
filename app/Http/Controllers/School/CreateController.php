<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('schools.create');
    }
}
