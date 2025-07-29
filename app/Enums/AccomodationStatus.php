<?php

namespace App\Enums;

enum AccomodationStatus: string
{
    case RESIDES = '1';
    case NOT_RESIDES = '2';
    case NO_ACCOMODATION = '8';
    case UNKNOWN = '9';

    /**
     * @return array<string, string>
     */
    public function label(): array
    {
        return match ($this) {
            self::RESIDES => ['id' => '1', 'accomodation_status_en' => 'Resides in the institution’s housing', 'accomodation_status_ar' => 'يسكن في إسكان الجهة التعليمية'],
            self::NOT_RESIDES => ['id' => '2', 'accomodation_status_en' => 'Does not reside in the institution’s housing', 'accomodation_status_ar' => 'لا يسكن في إسكان الجهة التعليمية'],
            self::NO_ACCOMODATION => ['id' => '8', 'accomodation_status_en' => 'No housing is available at the institution', 'accomodation_status_ar' => 'لا يوجد إسكان في الجهة التعليمية'],
            self::UNKNOWN => ['id' => '9', 'accomodation_status_en' => 'Unspecified', 'accomodation_status_ar' => 'غير محدد'],
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
