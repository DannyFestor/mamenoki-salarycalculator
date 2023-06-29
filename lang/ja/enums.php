<?php

declare(strict_types=1);

return [
    \App\Enums\SalaryType::class => [
        'Monthly' => '月給',
        'Hourly' => '時給',
    ],
    \App\Enums\StaffType::class => [
        'FullTime' => '常勤職員',
        'HalfPermanent' => '準常勤職員',
        'PartTime' => '非常勤職員',
    ],
    \App\Enums\WorkSystem::class => [
        'Rotation' => 'ローテ',
        'Fixed' => '固定',
    ],
];
