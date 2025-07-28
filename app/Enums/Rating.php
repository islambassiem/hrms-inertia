<?php

namespace App\Enums;

enum Rating: string
{
    case EXCELLENT_FIRST_DISTINCT = '1';
    case EXCELLENT_SECOND_DISTINCT = '2';
    case EXCELLENT = '3';
    case VERY_GOOD_SECOND_DISTINCT = '4';
    case VERY_GOOD_THIRD_DISTINCT = '0';
    case VERY_GOOD = '5';
    case GOOD = '6';
    case PASS = '7';
    case NA = '8';
    case OTHER = '9';

    /**
     * @return array<string, string>
     */
    public function lable(): array
    {
        return match ($this) {
            self::VERY_GOOD_THIRD_DISTINCT => ['id' => '0', 'rating_en' => 'Very Good Third Distinct', 'rating_ar' => 'جيد جداً مع مرتبة الشرف الثالثة'],
            self::EXCELLENT_FIRST_DISTINCT => ['id' => '1', 'rating_en' => 'Excellent First Distinct', 'rating_ar' => 'ممتاز مع مرتبة الشرف الأولى'],
            self::EXCELLENT_SECOND_DISTINCT => ['id' => '2', 'rating_en' => 'Excellent Second Distinct', 'rating_ar' => 'ممتاز مع مرتبة الشرف الثانية'],
            self::EXCELLENT => ['id' => '3', 'rating_en' => 'Excellent', 'rating_ar' => 'ممتاز'],
            self::VERY_GOOD_SECOND_DISTINCT => ['id' => '4', 'rating_en' => 'Very Good Second Distinct', 'rating_ar' => 'جيد جداً مع مرتبة الشرف الثانية'],
            self::VERY_GOOD => ['id' => '5', 'rating_en' => 'Very Good', 'rating_ar' => 'جيد جداً'],
            self::GOOD => ['id' => '6', 'rating_en' => 'Good', 'rating_ar' => 'جيد'],
            self::PASS => ['id' => '7', 'rating_en' => 'Pass', 'rating_ar' => 'مقبول'],
            self::NA => ['id' => '8', 'rating_en' => 'N/A', 'rating_ar' => 'لا ينطبق'],
            self::OTHER => ['id' => '9', 'rating_en' => 'Other', 'rating_ar' => 'أخرى'],
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
