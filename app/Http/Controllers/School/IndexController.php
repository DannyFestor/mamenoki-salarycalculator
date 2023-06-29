<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view(view: 'schools.index');
    }
}
