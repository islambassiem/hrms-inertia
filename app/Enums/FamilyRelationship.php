<?php

namespace App\Enums;

enum FamilyRelationship: string
{
    case SPOUSE = '1';
    case CHILD = '2';
    case MOTHER = '3';
    case FATHER = '4';
    case OTHER = '5';

    /**
     * @return array<string, string>
     */
    public function label(): array
    {
        return match ($this) {
            self::SPOUSE => ['id' => '1', 'family_relationship_en' => 'Spouse', 'family_relationship_ar' => 'زوج'],
            self::CHILD => ['id' => '2', 'family_relationship_en' => 'Child', 'family_relationship_ar' => 'ابن'],
            self::MOTHER => ['id' => '3', 'family_relationship_en' => 'Mother', 'family_relationship_ar' => 'ام'],
            self::FATHER => ['id' => '4', 'family_relationship_en' => 'Father', 'family_relationship_ar' => 'اب'],
            self::OTHER => ['id' => '5', 'family_relationship_en' => 'Other', 'family_relationship_ar' => 'اخرى'],
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
