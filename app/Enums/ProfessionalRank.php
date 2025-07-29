<?php

namespace App\Enums;

enum ProfessionalRank: string
{
    case OFFICIAL_1 = '1';
    case OFFICIAL_2 = '2';
    case OFFICIAL_3 = '3';
    case OFFICIAL_4 = '4';
    case OFFICIAL_5 = '5';
    case OFFICIAL_6 = '6';
    case OFFICIAL_7 = '7';
    case OFFICIAL_8 = '8';
    case OFFICIAL_9 = '9';
    case OFFICIAL_10 = '10';
    case OFFICIAL_11 = '11';
    case OFFICIAL_12 = '12';
    case OFFICIAL_13 = '13';
    case OFFICIAL_14 = '14';
    case OFFICIAL_15 = '15';
    case EXCELLENT = '16';
    case DEPUTY_MINISTER = '17';
    case MINISTER = '18';
    case CONSULTANT = '19';
    case UNIVERSITY_PRESIDENT = '20';
    case LABOUR_A = '21';
    case LABOUR_B = '22';
    case LABOUR_C = '23';
    case LABOUR_D = '24';
    case WAGE_SCALE = '25';
    case OPERATION_SCALE = '26';
    case SERVICE_31 = '31';
    case SERVICE_32 = '32';
    case SERVICE_33 = '33';
    case ARTICLE105 = '51';
    case RESIDENT = '60';
    case HEALTH_CONSULTANT = '61';
    case HEALTH_SPECIALIST_DOCTOR = '62';
    case HEALTH_RESIDENT = '63';
    case HEALTH_PHARMACIST = '64';
    case HEALTH_SPECIALIST = '65';
    case HEALTH_TECHNICIAN = '66';
    case ASSISTANT_A = '67';
    case ASSISTANT_B = '68';
    case SENIOR_SPECIALIST = '69';
    case CONSULTANT_SPECIALIST = '70';
    case SENIOR_PHARMACIST = '71';
    case CONSULTANT_PHARMACIST = '72';
    case CONTRACTED = '73';
    case NA = '98';
    case OTHERS = '99';

    /**
     * @return array<string>
     */
    public function label(): array
    {
        return match ($this) {
            self::OFFICIAL_1 => ['id' => '1', 'en' => 'Official Position - Grade 1', 'ar' => 'وظيفة رسمية - المرتبة الأولى'],
            self::OFFICIAL_2 => ['id' => '2', 'en' => 'Official Position - Grade 2', 'ar' => 'وظيفة رسمية - المرتبة الثانية'],
            self::OFFICIAL_3 => ['id' => '3', 'en' => 'Official Position - Grade 3', 'ar' => 'وظيفة رسمية - المرتبة الثالثة'],
            self::OFFICIAL_4 => ['id' => '4', 'en' => 'Official Position - Grade 4', 'ar' => 'وظيفة رسمية - المرتبة الرابعة'],
            self::OFFICIAL_5 => ['id' => '5', 'en' => 'Official Position - Grade 5', 'ar' => 'وظيفة رسمية - المرتبة الخامسة'],
            self::OFFICIAL_6 => ['id' => '6', 'en' => 'Official Position - Grade 6', 'ar' => 'وظيفة رسمية - المرتبة السادسة'],
            self::OFFICIAL_7 => ['id' => '7', 'en' => 'Official Position - Grade 7', 'ar' => 'وظيفة رسمية - المرتبة السابعة'],
            self::OFFICIAL_8 => ['id' => '8', 'en' => 'Official Position - Grade 8', 'ar' => 'وظيفة رسمية - المرتبة الثامنة'],
            self::OFFICIAL_9 => ['id' => '9', 'en' => 'Official Position - Grade 9', 'ar' => 'وظيفة رسمية - المرتبة التاسعة'],
            self::OFFICIAL_10 => ['id' => '10', 'en' => 'Official Position - Grade 10', 'ar' => 'وظيفة رسمية - المرتبة العاشرة'],
            self::OFFICIAL_11 => ['id' => '11', 'en' => 'Official Position - Grade 11', 'ar' => 'وظيفة رسمية - المرتبة الحادية عشر'],
            self::OFFICIAL_12 => ['id' => '12', 'en' => 'Official Position - Grade 12', 'ar' => 'وظيفة رسمية - المرتبة الثانية عشر'],
            self::OFFICIAL_13 => ['id' => '13', 'en' => 'Official Position - Grade 13', 'ar' => 'وظيفة رسمية - المرتبة الثالثة عشر'],
            self::OFFICIAL_14 => ['id' => '14', 'en' => 'Official Position - Grade 14', 'ar' => 'وظيفة رسمية - المرتبة الرابعة عشر'],
            self::OFFICIAL_15 => ['id' => '15', 'en' => 'Official Position - Grade 15', 'ar' => 'وظيفة رسمية - المرتبة الخامسة عشر'],
            self::EXCELLENT => ['id' => '16', 'en' => 'Exceptional Grade', 'ar' => 'المرتبة الممتازة'],
            self::MINISTER => ['id' => '17', 'en' => 'Deputy Minister', 'ar' => 'نائب الوزير'],
            self::DEPUTY_MINISTER => ['id' => '18', 'en' => 'Minister or Equivalent Rank', 'ar' => 'وزير ومن في مرتبته'],
            self::CONSULTANT => ['id' => '19', 'en' => 'Advisor / Consultant', 'ar' => 'مستشار'],
            self::UNIVERSITY_PRESIDENT => ['id' => '20', 'en' => 'University President', 'ar' => 'رئيس الجامعة'],
            self::LABOUR_A => ['id' => '21', 'en' => 'Labor Scale - Category A', 'ar' => 'بند العمال - فئة أ'],
            self::LABOUR_B => ['id' => '22', 'en' => 'Labor Scale - Category B', 'ar' => 'بند العمال - فئة ب'],
            self::LABOUR_C => ['id' => '23', 'en' => 'Labor Scale - Category C', 'ar' => 'بند العمال - فئة ج'],
            self::LABOUR_D => ['id' => '24', 'en' => 'Labor Scale - Category D', 'ar' => 'بند العمال - فئة د'],
            self::WAGE_SCALE => ['id' => '25', 'en' => 'Wage Scale', 'ar' => 'بند أجور'],
            self::OPERATION_SCALE => ['id' => '26', 'en' => 'Operations Contract', 'ar' => 'بند تشغيل'],
            self::SERVICE_31 => ['id' => '31', 'en' => 'Labor Scale - Category A', 'ar' => 'مستخدم - الدرجة 31'],
            self::SERVICE_32 => ['id' => '32', 'en' => 'Labor Scale - Category B', 'ar' => 'مستخدم - الدرجة 32'],
            self::SERVICE_33 => ['id' => '33', 'en' => 'Labor Scale - Category C', 'ar' => 'مستخدم - الدرجة 33'],
            self::ARTICLE105 => ['id' => '51', 'en' => 'Article 105 - Daily Wage', 'ar' => 'بند105 - أجر يومي'],
            self::RESIDENT => ['id' => '60', 'en' => 'Resident Doctor (Registrar)', 'ar' => 'طبيب نائب'],
            self::HEALTH_CONSULTANT => ['id' => '61', 'en' => 'Health Position - Consultant Physician', 'ar' => 'وظائف صحية - طبيب استشاري'],
            self::HEALTH_SPECIALIST_DOCTOR => ['id' => '62', 'en' => 'Health Position - Specialist Physician', 'ar' => 'وظائف صحية - طبيب اختصاصي'],
            self::HEALTH_RESIDENT => ['id' => '63', 'en' => 'Health Position - Resident Physician', 'ar' => 'وظائف صحية - طبيب مقيم'],
            self::HEALTH_PHARMACIST => ['id' => '64', 'en' => 'Health Position - Pharmacist', 'ar' => 'وظائف صحية - صيدلي'],
            self::HEALTH_SPECIALIST => ['id' => '65', 'en' => 'Health Position - Specialist (non-medical)', 'ar' => 'وظائف صحية - اختصاصي'],
            self::HEALTH_TECHNICIAN => ['id' => '66', 'en' => 'Health Position - Technician', 'ar' => 'وظائف صحية - فني'],
            self::ASSISTANT_A => ['id' => '67', 'en' => 'Health Position - Assistant Health Worker A', 'ar' => 'وظائف صحية - مساعد صحي أ'],
            self::ASSISTANT_B => ['id' => '68', 'en' => 'Health Position - Assistant Health Worker B', 'ar' => 'وظائف صحية - مساعد صحي ب'],
            self::SENIOR_SPECIALIST => ['id' => '69', 'en' => '	Senior Specialist', 'ar' => 'أخصائي أول'],
            self::CONSULTANT_SPECIALIST => ['id' => '70', 'en' => '	Consultant Specialist', 'ar' => 'أخصائي أستشاري'],
            self::SENIOR_PHARMACIST => ['id' => '71', 'en' => '	Senior Pharmacist', 'ar' => 'صيدلي أول'],
            self::CONSULTANT_PHARMACIST => ['id' => '72', 'en' => 'Consultant Pharmacist', 'ar' => 'صيدلي أستشاري'],
            self::CONTRACTED => ['id' => '73', 'en' => 'Contracted', 'ar' => 'متعاقد'],
            self::NA => ['id' => '98', 'en' => 'Not Applicable', 'ar' => 'لاينطبق'],
            self::OTHERS => ['id' => '99', 'en' => 'Other', 'ar' => 'أخرى'],
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
