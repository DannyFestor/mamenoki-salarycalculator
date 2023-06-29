<?php

declare(strict_types=1);

namespace App\Enums;

trait IsArrayable {
    public static function toArray() : array {
        $result = [];

        foreach(self::cases() as $case) {
            $result[$case->value] = $case->name;
        }

        return $result;
    }
}
