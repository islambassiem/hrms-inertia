<?php

namespace App\Enums;

enum ResearchType: string
{
    case BOOK = '1';
    case RESEARCH = '2';
    case PAPER = '3';

    /**
     * @return array<string, string>
     */
    public function lable(): array
    {
        return match ($this) {
            self::BOOK => ['id' => '1', 'name_en' => 'Book', 'name_ar' => 'كتاب'],
            self::RESEARCH => ['id' => '2', 'name_en' => 'Research', 'name_ar' => 'بحث علمي'],
            self::PAPER => ['id' => '3', 'name_en' => 'Paper', 'name_ar' => 'ورقة علمية'],
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
