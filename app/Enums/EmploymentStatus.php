<?php

namespace App\Enums;

enum EmploymentStatus: string
{
    case ONJOB_FULL = '11';
    case ONJOB_PART = '12';
    case CONSULTANT = '21';
    case DELEGATE = '22';
    case SCHOLARSHIP = '23';
    case SUSPENDED = '24';
    case ACADEMIC_LEAVE = '25';
    case RETIRED = '26';
    case DISMISSED = '27';
    case ENDED_CONTRACT = '28';
    case OTHERS = '99';

    /**
     * @return array<string, string>
     */
    public function label(): array
    {
        return match ($this) {
            self::ONJOB_FULL => ['id' => '11', 'employment_status_en' => 'On-the-job and not associated with work outside the educational institution', 'employment_status_ar' => 'على رأس العمل ولا يرتبط بأعمال خارج الجهة التعليمية'],
            self::ONJOB_PART => ['id' => '12', 'employment_status_en' => 'On-the-job and working as a part-time consultant for an external entity', 'employment_status_ar' => 'على رأس العمل ويعمل مستشارا غير متفرغ لدى جهة خارجية'],
            self::CONSULTANT => ['id' => '21', 'employment_status_en' => 'Working as a full-time consultant for an external entity', 'employment_status_ar' => 'يعمل مستشارا متفرغا لجهة خارجية'],
            self::DELEGATE => ['id' => '22', 'employment_status_en' => 'Delegate or seconded to an external entity', 'employment_status_ar' => 'مندوب أو معار لجهة خارجية'],
            self::SCHOLARSHIP => ['id' => '23', 'employment_status_en' => 'Scholarship student', 'employment_status_ar' => 'مبتعث'],
            self::SUSPENDED => ['id' => '24', 'employment_status_en' => 'Suspended from duty (typically pending investigation or disciplinary action)', 'employment_status_ar' => 'مكفوف اليد'],
            self::ACADEMIC_LEAVE => ['id' => '25', 'employment_status_en' => 'On academic leave (for research or scholarly work)', 'employment_status_ar' => 'تفرغ علمي'],
            self::RETIRED => ['id' => '26', 'employment_status_en' => 'Retired', 'employment_status_ar' => 'متقاعد'],
            self::DISMISSED => ['id' => '27', 'employment_status_en' => 'Record closed / Dismissed / Deregistered (depending on context)', 'employment_status_ar' => 'مطوي قيده'],
            self::ENDED_CONTRACT => ['id' => '28', 'employment_status_en' => 'Contract ended', 'employment_status_ar' => 'عقد منتهي'],
            self::OTHERS => ['id' => '99', 'employment_status_en' => 'Others', 'employment_status_ar' => 'اخرى'],
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
