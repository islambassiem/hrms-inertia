<?php

namespace App\Enums;

enum ResearchStatus: string
{
    case INDIVIDUAL = '1';
    case COLLECTIVE = '2';

    /**
     * @return array<string, string>
     */
    public function lable(): array
    {
        return match ($this) {
            self::INDIVIDUAL => ['id' => '1', 'name_en' => 'Individual', 'name_ar' => 'فردي'],
            self::COLLECTIVE => ['id' => '2', 'name_en' => 'Collaborative', 'name_ar' => 'مشترك مع آخرون'],
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
