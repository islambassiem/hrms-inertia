<?php

namespace App\Enums;

enum GPAType: string
{
    case FIVE_POINTS = '1';
    case FOUR_POINTS = '2';
    case PERCENTAGE = '3';
    case OTHER = '4';

    /**
     * @return array<string, string>
     */
    public function label(): array
    {
        return match ($this) {
            self::FIVE_POINTS => ['id' => '1', 'name_en' => '5 Point Scale', 'name_ar' => 'نظام المعدل التراكمي المكون من خمس نقاط'],
            self::FOUR_POINTS => ['id' => '2', 'name_en' => '4 Point Scale', 'name_ar' => 'نظام المعدل التراكمي المكون من أربع نقاط'],
            self::PERCENTAGE => ['id' => '3', 'name_en' => 'Percentage', 'name_ar' => 'نظام المعدل التراكمي المئوي'],
            self::OTHER => ['id' => '4', 'name_en' => 'Other', 'name_ar' => 'أخرى'],
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
