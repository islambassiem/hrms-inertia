<?php

namespace App\Enums;

enum ResearchCitation: string
{
    case SCOUPS = '1';
    case ISI = '2';

    /**
     * @return array<string, string>
     */
    public function lable(): array
    {
        return match ($this) {
            self::SCOUPS => ['id' => '1', 'name_en' => 'SCOPUS', 'name_ar' => 'SCOPUS'],
            self::ISI => ['id' => '2', 'name_en' => 'ISI', 'name_ar' => 'ISI'],
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
