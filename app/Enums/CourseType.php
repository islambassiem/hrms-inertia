<?php

namespace App\Enums;

enum CourseType: string
{
    case COURSE = '1';
    case CERTIFICATE = '2';
    case SYMPOSIUM = '3';
    case WORKSHOP = '4';
    case OTHER = '5';

    /**
     * @return array<string, string>
     */
    public function label(): array
    {
        return match ($this) {
            self::COURSE => ['id' => '1', 'course_type_en' => 'Training Course', 'course_type_ar' => 'دورة تدريبية'],
            self::CERTIFICATE => ['id' => '2', 'course_type_en' => 'Certificate', 'course_type_ar' => 'شهادة'],
            self::SYMPOSIUM => ['id' => '3', 'course_type_en' => 'Scientific Symposium', 'course_type_ar' => 'ندوة علمية'],
            self::WORKSHOP => ['id' => '4', 'course_type_en' => 'Workshop', 'course_type_ar' => 'ورشة تدريبية'],
            self::OTHER => ['id' => '5', 'course_type_en' => 'Other', 'course_type_ar' => 'أخرى'],
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
