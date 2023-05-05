<?php

declare(strict_types=1);

namespace App\Enums;

enum StaffType: int
{
    case FullTime = 0;      // 常勤職員
    case HalfPermanent = 1; // 準常勤職員
    case PartTime = 2;      // 非常勤職員
}
