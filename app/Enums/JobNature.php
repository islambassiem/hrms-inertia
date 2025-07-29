<?php

namespace App\Enums;

enum JobNature: string
{
    case TEACHING = '1';
    case RESEARCH = '2';
    case ADMINSTRATIVE = '3';
    case TEACHING_AND_RESEARCH = '4';
    case TEACHING_AND_ADMINSTRATIVE = '5';
    case RESEARCH_AND_ADMINSTRATIVE = '6';
    case TEACHING_RESEARCH_AND_ADMINSTRATIVE = '7';
    case OTHER = '8';

    /**
     * @return array<string, string>
     */
    public function label(): array
    {
        return match ($this) {
            self::TEACHING => ['id' => '1', 'job_nature_en' => 'Teaching', 'job_nature_ar' => 'تدريسية'],
            self::RESEARCH => ['id' => '2', 'job_nature_en' => 'Research', 'job_nature_ar' => 'بحثية'],
            self::ADMINSTRATIVE => ['id' => '3', 'job_nature_en' => 'Adminstrative', 'job_nature_ar' => 'إدارية'],
            self::TEACHING_AND_RESEARCH => ['id' => '4', 'job_nature_en' => 'Teaching and Research', 'job_nature_ar' => 'تدريسية وبحثية'],
            self::TEACHING_AND_ADMINSTRATIVE => ['id' => '5', 'job_nature_en' => 'Teaching and Adminstrative', 'job_nature_ar' => 'تدريسية وإدارية'],
            self::RESEARCH_AND_ADMINSTRATIVE => ['id' => '6', 'job_nature_en' => 'Research and Adminstrative', 'job_nature_ar' => 'بحثية وإدارية'],
            self::TEACHING_RESEARCH_AND_ADMINSTRATIVE => ['id' => '7', 'job_nature_en' => 'Teaching, Research and Adminstrative', 'job_nature_ar' => 'تدريسية وبحثية وإدارية'],
            self::OTHER => ['id' => '8', 'job_nature_en' => 'Other', 'job_nature_ar' => 'أخرى'],
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
