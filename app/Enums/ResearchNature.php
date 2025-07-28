<?php

namespace App\Enums;

enum ResearchNature: string
{
    case THEORETICAL = '1';
    case EMPIRICAL = '2';
    case MIXED = '3';

    /**
     * @return array<string, string>
     */
    public function label(): array
    {
        return match ($this) {
            self::THEORETICAL => ['id' => '1', 'research_nature_en' => 'Theoretical', 'research_nature_ar' => 'أساسي'],
            self::EMPIRICAL => ['id' => '2', 'research_nature_en' => 'Empirical', 'research_nature_ar' => 'تطبيقي'],
            self::MIXED => ['id' => '3', 'research_nature_en' => 'Research in empirical development', 'research_nature_ar' => 'بحوث في التطوير التجريبي'],
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
