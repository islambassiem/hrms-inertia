<?php

namespace App\Enums;

enum StudyType: string
{
    case FULLTIME = '0';
    case PARTTIME = '1';
    case AFFILIATION = '2';
    case DEVELOPED_AFFILIATION = '3';
    case PARALLEL_LEARNING = '4';
    case REMOTE_LEARNING = '5';
    case LISTENER = '6';
    case BRIDGING = '7';
    case UNREGISTERED = '8';
    case BLENDED_LEARNING = '10';
    case OTHER = '9';

    /**
     * @return array<string, string>
     */
    public function label(): array
    {
        return match ($this) {
            self::FULLTIME => ['id' => '0', 'name_en' => 'Full time', 'name_ar' => 'انتظام كلي'],
            self::PARTTIME => ['id' => '1', 'name_en' => 'Part time', 'name_ar' => 'انتظام جزئي'],
            self::AFFILIATION => ['id' => '2', 'name_en' => 'Affiliation', 'name_ar' => 'انتساب مطور'],
            self::DEVELOPED_AFFILIATION => ['id' => '3', 'name_en' => 'Developed Affiliation', 'name_ar' => 'انتساب مطور'],
            self::PARALLEL_LEARNING => ['id' => '4', 'name_en' => 'Parallel learning', 'name_ar' => 'تعليم موازي'],
            self::REMOTE_LEARNING => ['id' => '5', 'name_en' => 'Remote learning', 'name_ar' => 'تعليم عن بعد'],
            self::LISTENER => ['id' => '6', 'name_en' => 'Listener', 'name_ar' => 'مستمع'],
            self::BRIDGING => ['id' => '7', 'name_en' => 'Bridging', 'name_ar' => 'تجسير'],
            self::UNREGISTERED => ['id' => '8', 'name_en' => 'Unregistered', 'name_ar' => 'غير مقيد'],
            self::BLENDED_LEARNING => ['id' => '10', 'name_en' => 'Blended learning', 'name_ar' => 'تعليم مدمج'],
            self::OTHER => ['id' => '9', 'name_en' => 'Other', 'name_ar' => 'أخرى'],
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
