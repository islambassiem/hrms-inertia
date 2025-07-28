<?php

namespace App\Enums;

enum MaritalStatus: string
{
    case SINGLE = '1';
    case MARRIED = '2';
    case OTHER = '9';

    /**
     * @return array<string, string>
     */
    public function label(): array
    {
        return match ($this) {
            self::SINGLE => ['id' => '1', 'marital_status_en' => 'Single', 'marital_status_ar' => 'أعزب'],
            self::MARRIED => ['id' => '2', 'marital_status_en' => 'Married', 'marital_status_ar' => 'متزوج'],
            self::OTHER => ['id' => '9', 'marital_status_en' => 'Other', 'maretal_status_ar' => 'أخرى'],
        };
    }

    /**
     * @return array<string>
     */
    public static function toArray(): array
    {
        $array = [];
        foreach (self::cases() as $case) {
            $array[] = $case->value;
        }

        return $array;
    }
}
