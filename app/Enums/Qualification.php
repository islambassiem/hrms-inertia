<?php

namespace App\Enums;

enum Qualification: string
{
    case BACHELOR = '2';
    case POSTGRADUATE_DIPLOMA = '3';
    case MASTER = '4';
    case DOCTORATE = '5';
    case FELLOWSHIP = '6';
    case DIPLOMA = '1';
    case PREPARATORY_YEAR = '7';
    case NA = '8';
    case OTHER = '9';
    case BOARD_CERTIFICATE = '10';
    case HIGH_SCHOOL = '11';
    case INTERMEDIATE_SCHOOL = '12';
    case PRIMARY_SCHOOL = '13';
    case ILLITERATE = '14';
    case ASSOCIATE_DIPLOMA = '15';
    case MILITARY = '16';
    case INDUSTRIAL = '17';
    case PRISON = '18';
    case INDUSTRICAL_HIGH_SCHOOL = '19';
    case COMMERICAL_HIGH_SCHOOL = '20';
    case TECHNICAL_HIGH_SCHOOL = '21';
    case LICENCE = '22';
    case ADVANCED_DIPLOMA = '23';

    /**
     * @return array<string, string>
     */
    public function label(): array
    {
        return match ($this) {
            self::DIPLOMA => ['id' => '1', 'qualification_en' => 'Diploma', 'qualification_ar' => 'دبلوم متوسط'],
            self::BACHELOR => ['id' => '2', 'qualification_en' => 'Bachelors degree', 'qualification_ar' => 'بكالوريوس'],
            self::POSTGRADUATE_DIPLOMA => ['id' => '3', 'qualification_en' => 'Postgraduate Diploma', 'qualification_ar' => 'دبلوم عال '],
            self::MASTER => ['id' => '4', 'qualification_en' => 'Masters degree', 'qualification_ar' => 'ماجستير'],
            self::DOCTORATE => ['id' => '5', 'qualification_en' => 'Doctorate / PhD', 'qualification_ar' => 'دكتوراه'],
            self::FELLOWSHIP => ['id' => '6', 'qualification_en' => 'Fellowship', 'qualification_ar' => 'زمالة'],
            self::PREPARATORY_YEAR => ['id' => '7', 'qualification_en' => 'Preparatory Year', 'qualification_ar' => 'السنة التحضيرية'],
            self::NA => ['id' => '8', 'qualification_en' => 'Not applicable', 'qualification_ar' => 'لا ينطبق'],
            self::OTHER => ['id' => '9', 'qualification_en' => 'Other', 'qualification_ar' => 'أخرى'],
            self::BOARD_CERTIFICATE => ['id' => '10', 'qualification_en' => 'Board certified', 'qualification_ar' => 'البورد'],
            self::HIGH_SCHOOL => ['id' => '11', 'qualification_en' => 'High/Secondary School', 'qualification_ar' => 'الثانوية العامة'],
            self::INTERMEDIATE_SCHOOL => ['id' => '12', 'qualification_en' => 'Middle/Intermediate School', 'qualification_ar' => 'المتوسطة'],
            self::PRIMARY_SCHOOL => ['id' => '13', 'qualification_en' => 'Primary School', 'qualification_ar' => 'الابتدائية'],
            self::ILLITERATE => ['id' => '14', 'qualification_en' => 'Illiterate', 'qualification_ar' => 'أمي'],
            self::ASSOCIATE_DIPLOMA => ['id' => '15', 'qualification_en' => 'Associate Diploma', 'qualification_ar' => 'دبلوم مشارك'],
            self::MILITARY => ['id' => '16', 'qualification_en' => 'Certificate of completion of military vocational training', 'qualification_ar' => 'شهادة إتمام التدريب العسكري المهني'],
            self::INDUSTRIAL => ['id' => '17', 'qualification_en' => 'Diploma of Secondary Industrial Institutes', 'qualification_ar' => 'شهادة دبلوم المعاهد الصناعية الثانوية'],
            self::PRISON => ['id' => '18', 'qualification_en' => 'Certificate of completion of the prison program', 'qualification_ar' => 'شهادة إتمام برنامج السجون'],
            self::INDUSTRICAL_HIGH_SCHOOL => ['id' => '19', 'qualification_en' => 'Industrial High/Secondary School', 'qualification_ar' => 'ثانوية صناعية'],
            self::COMMERICAL_HIGH_SCHOOL => ['id' => '20', 'qualification_en' => 'Commercial High/Secondary School', 'qualification_ar' => 'ثانوية تجارية'],
            self::TECHNICAL_HIGH_SCHOOL => ['id' => '21', 'qualification_en' => 'Technical High/Secondary School', 'qualification_ar' => 'ثانوية فنية '],
            self::LICENCE => ['id' => '22', 'qualification_en' => 'Licence', 'qualification_ar' => 'ليسانس '],
            self::ADVANCED_DIPLOMA => ['id' => '23', 'qualification_en' => 'Advanced Diploma', 'qualification_ar' => 'دبلوم متقدم'],
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
