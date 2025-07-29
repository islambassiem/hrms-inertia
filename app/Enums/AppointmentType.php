<?php

namespace App\Enums;

enum AppointmentType: string
{
    case OFFICIAL = '1';
    case CONTRACT = '2';
    case PARTTIME = '3';
    case TRANSFER = '4';
    case NA = '8';
    case UNDETERMINED = '9';

    /**
     * @return array<string, string>
     */
    public function label(): array
    {
        return match ($this) {
            self::OFFICIAL => ['id' => '1', 'appointment_type_en' => 'Official position (Faculty cadre / Academic staff member)', 'appointment_type_ar' => 'وظيفة رسمية (كادر أعضاء هيئة التدريس)'],
            self::CONTRACT => ['id' => '2', 'appointment_type_en' => 'Contracted (Employee under a fixed-term or renewable contract)', 'appointment_type_ar' => 'متعاقد'],
            self::PARTTIME => ['id' => '3', 'appointment_type_en' => 'Part-time/Adjunct (Collaborator or Adjunct Faculty)', 'appointment_type_ar' => 'متعاون '],
            self::TRANSFER => ['id' => '4', 'appointment_type_en' => 'Transferred (from another department or institution)', 'appointment_type_ar' => 'منقول'],
            self::NA => ['id' => '8', 'appointment_type_en' => 'Not applicable', 'appointment_type_ar' => 'لاينطبق'],
            self::UNDETERMINED => ['id' => '9', 'appointment_type_en' => 'Unspecified / Undetermined', 'appointment_type_ar' => 'غير محدد'],
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
