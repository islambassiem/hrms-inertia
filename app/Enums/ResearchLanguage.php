<?php

namespace App\Enums;

enum ResearchLanguage: string
{
    case ARABIC = '1';
    case ENGLISH = '2';
    case FRENCH = '3';
    case CHINESE = '4';
    case GERMAN = '5';
    case INDIAN = '6';
    case SPANISH = '7';
    case BENGALI = '8';
    case PORTOGESE = '9';
    case OTHER = '10';

    /**
     * @return array<string, string>
     */
    public function lable(): array
    {
        return match ($this) {
            self::ARABIC => ['id' => '1', 'name_en' => 'Arabic', 'name_ar' => 'العربية'],
            self::ENGLISH => ['id' => '2', 'name_en' => 'English', 'name_ar' => 'الإنجليزية'],
            self::FRENCH => ['id' => '3', 'name_en' => 'French', 'name_ar' => 'الفرنسية'],
            self::CHINESE => ['id' => '4', 'name_en' => 'Chinese', 'name_ar' => 'الصينية'],
            self::GERMAN => ['id' => '5', 'name_en' => 'German', 'name_ar' => 'الألمانية'],
            self::INDIAN => ['id' => '6', 'name_en' => 'Indian', 'name_ar' => 'الهندية'],
            self::SPANISH => ['id' => '7', 'name_en' => 'Spanish', 'name_ar' => 'الإسبانية'],
            self::BENGALI => ['id' => '8', 'name_en' => 'Bengali', 'name_ar' => 'البنجالية'],
            self::PORTOGESE => ['id' => '9', 'name_en' => 'Portuguese', 'name_ar' => 'البرتغالية'],
            self::OTHER => ['id' => '10', 'name_en' => 'Other', 'name_ar' => 'أخرى'],
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
