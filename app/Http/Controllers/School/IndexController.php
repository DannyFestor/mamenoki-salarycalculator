<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\School;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view(view: 'schools.index');
    }
}
