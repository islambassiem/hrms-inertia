<?php

namespace App\Enums;

enum Religion: string
{
    case MUSLIM = '1';
    case CHRISTIAN = '2';
    case JEWISH = '3';
    case SIKH = '4';
    case HINDU = '5';
    case BUDDHIST = '6';
    case OTHER = '7';
    case UNDEFINED = '8';

    /**
     * @return array<string, string>
     */
    public function label(): array
    {
        return match ($this) {
            self::MUSLIM => ['id' => '1', 'religion_en' => 'Muslim', 'religion_ar' => 'مسلم'],
            self::CHRISTIAN => ['id' => '2', 'religion_en' => 'Christian', 'religion_ar' => 'مسيحي'],
            self::JEWISH => ['id' => '3', 'religion_en' => 'Jewish', 'religion_ar' => 'يهودي'],
            self::SIKH => ['id' => '4', 'religion_en' => 'Sikh', 'religion_ar' => 'سيخي'],
            self::HINDU => ['id' => '5', 'religion_en' => 'Hindu', 'religion_ar' => 'هندي'],
            self::BUDDHIST => ['id' => '6', 'religion_en' => 'Buddhist', 'religion_ar' => 'بودي'],
            self::OTHER => ['id' => '7', 'religion_en' => 'Other', 'religion_ar' => 'أخرى'],
            self::UNDEFINED => ['id' => '8', 'religion_en' => 'Undefined', 'religion_ar' => 'غير محدد'],
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
