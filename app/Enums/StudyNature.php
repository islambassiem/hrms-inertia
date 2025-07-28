<?php

namespace App\Enums;

enum StudyNature: string
{
    case RESEARCH = '1';
    case SUBJECT = '2';
    case BOTH = '3';

    /**
     * @return array<string, string>
     */
    public function lable(): array
    {
        return match ($this) {
            self::RESEARCH => ['id' => '1', 'name_en' => 'Research Only', 'name_ar' => 'بحث فقط'],
            self::SUBJECT => ['id' => '2', 'name_en' => 'Subjects Only', 'name_ar' => 'مواد فقط'],
            self::BOTH => ['id' => '3', 'name_en' => 'Research and Subjects', 'name_ar' => 'بحث ومواد'],
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
