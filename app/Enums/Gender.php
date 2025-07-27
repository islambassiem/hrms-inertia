<?php

namespace App\Enums;

enum Gender: string
{
    case MALE = '1';
    case FEMALE = '2';

    /**
     * @return array<string, string>
     */
    public function label(): array
    {
        return match ($this) {
            self::MALE => ['id' => '1', 'gender_en' => 'Male', 'gender_ar' => 'ذكر'],
            self::FEMALE => ['id' => '2', 'gender_en' => 'Female', 'gender_ar' => 'أنثى'],
        };
    }
}
