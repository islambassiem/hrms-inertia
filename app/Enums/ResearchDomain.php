<?php

namespace App\Enums;

enum ResearchDomain: string
{
    case NATURAL = '1';
    case ENGINEERING = '2';
    case MEDICINE = '3';
    case AGRICULTURE = '4';
    case SOCIAL = '5';
    case ARTS = '6';
    case ISLAMIC = '7';
    case MULTIDISCIPULINARY = '8';

    /**
     * @return array<string, string>
     */
    public function lable(): array
    {
        return match ($this) {
            self::NATURAL => ['id' => '1', 'name_en' => 'Natural science', 'name_ar' => 'العلوم الطبيعية'],
            self::ENGINEERING => ['id' => '2', 'name_en' => 'Engineering and technology', 'name_ar' => 'الهندسة والتقنية'],
            self::MEDICINE => ['id' => '3', 'name_en' => 'Medicine, health sciences and health care', 'name_ar' => 'الطب والعلوم الصحية والرعاية الصحية'],
            self::AGRICULTURE => ['id' => '4', 'name_en' => 'Agricultural Sciences', 'name_ar' => 'العلوم الزراعية'],
            self::SOCIAL => ['id' => '5', 'name_en' => 'Social sciences, business and law', 'name_ar' => 'العلوم الاجتماعية والأعمال والقانون'],
            self::ARTS => ['id' => '6', 'name_en' => 'Humanities and arts', 'name_ar' => 'الإنسانيات والفنون'],
            self::ISLAMIC => ['id' => '7', 'name_en' => 'Islamic studies', 'name_ar' => 'الدراسات الإسلامية'],
            self::MULTIDISCIPULINARY => ['id' => '8', 'name_en' => 'Multidisciplinary services', 'name_ar' => 'الخدمات متعدد التخصصات'],
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
