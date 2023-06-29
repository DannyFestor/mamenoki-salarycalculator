<?php

declare(strict_types=1);

namespace App\Enums;

enum WorkSystem: int
{
    use IsArrayable;

    case Rotation = 0;  // ローテ
    case Fixed = 1;     // 固定
}
