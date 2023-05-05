<?php

declare(strict_types=1);

namespace App\Enums;

enum SalaryType: int
{
    case Monthly = 0;   //月給
    case Hourly = 1;    //時給
}
