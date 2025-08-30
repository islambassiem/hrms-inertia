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
            self::DIPLOMA => ['id' => '1', 'name' => app()->getLocale() === 'en' ? 'Diploma' : 'دبلوم متوسط'],
            self::BACHELOR => ['id' => '2', 'name' => app()->getLocale() === 'en' ? 'Bachelors degree' : 'بكالوريوس'],
            self::POSTGRADUATE_DIPLOMA => ['id' => '3', 'name' => app()->getLocale() === 'en' ? 'Postgraduate Diploma' : 'دبلوم عال '],
            self::MASTER => ['id' => '4', 'name' => app()->getLocale() === 'en' ? 'Masters degree' : 'ماجستير'],
            self::DOCTORATE => ['id' => '5', 'name' => app()->getLocale() === 'en' ? 'Doctorate / PhD' : 'دكتوراه'],
            self::FELLOWSHIP => ['id' => '6', 'name' => app()->getLocale() === 'en' ? 'Fellowship' : 'زمالة'],
            self::PREPARATORY_YEAR => ['id' => '7', 'name' => app()->getLocale() === 'en' ? 'Preparatory Year' : 'السنة التحضيرية'],
            self::NA => ['id' => '8', 'name' => app()->getLocale() === 'en' ? 'Not applicable' : 'لا ينطبق'],
            self::OTHER => ['id' => '9', 'name' => app()->getLocale() === 'en' ? 'Other' : 'أخرى'],
            self::BOARD_CERTIFICATE => ['id' => '10', 'name' => app()->getLocale() === 'en' ? 'Board certified' : 'البورد'],
            self::HIGH_SCHOOL => ['id' => '11', 'name' => app()->getLocale() === 'en' ? 'High/Secondary School' : 'الثانوية العامة'],
            self::INTERMEDIATE_SCHOOL => ['id' => '12', 'name' => app()->getLocale() === 'en' ? 'Middle/Intermediate School' : 'المتوسطة'],
            self::PRIMARY_SCHOOL => ['id' => '13', 'name' => app()->getLocale() === 'en' ? 'Primary School' : 'الابتدائية'],
            self::ILLITERATE => ['id' => '14', 'name' => app()->getLocale() === 'en' ? 'Illiterate' : 'أمي'],
            self::ASSOCIATE_DIPLOMA => ['id' => '15', 'name' => app()->getLocale() === 'en' ? 'Associate Diploma' : 'دبلوم مشارك'],
            self::MILITARY => ['id' => '16', 'name' => app()->getLocale() === 'en' ? 'Certificate of completion of military vocational training' : 'شهادة إتمام التدريب العسكري المهني'],
            self::INDUSTRIAL => ['id' => '17', 'name' => app()->getLocale() === 'en' ? 'Diploma of Secondary Industrial Institutes' : 'شهادة دبلوم المعاهد الصناعية الثانوية'],
            self::PRISON => ['id' => '18', 'name' => app()->getLocale() === 'en' ? 'Certificate of completion of the prison program' : 'شهادة إتمام برنامج السجون'],
            self::INDUSTRICAL_HIGH_SCHOOL => ['id' => '19', 'name' => app()->getLocale() === 'en' ? 'Industrial High/Secondary School' : 'ثانوية صناعية'],
            self::COMMERICAL_HIGH_SCHOOL => ['id' => '20', 'name' => app()->getLocale() === 'en' ? 'Commercial High/Secondary School' : 'ثانوية تجارية'],
            self::TECHNICAL_HIGH_SCHOOL => ['id' => '21', 'name' => app()->getLocale() === 'en' ? 'Technical High/Secondary School' : 'ثانوية فنية '],
            self::LICENCE => ['id' => '22', 'name' => app()->getLocale() === 'en' ? 'Licence' : 'ليسانس '],
            self::ADVANCED_DIPLOMA => ['id' => '23', 'name' => app()->getLocale() === 'en' ? 'Advanced Diploma' : 'دبلوم متقدم'],
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
