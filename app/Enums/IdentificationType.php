<?php

namespace App\Enums;

enum IdentificationType: string
{
    case NID = '1';
    case PASSPORT = '2';

    /**
     * @return array<string, string>
     */
    public function label(): array
    {
        return match ($this) {
            self::NID => ['id' => '1', 'identification_type_en' => 'National ID', 'identification_type_ar' => 'الهوية الوطنية'],
            self::PASSPORT => ['id' => '2', 'identification_type_en' => 'Passport', 'identification_type_ar' => 'الجواز'],
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
