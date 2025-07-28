<?php

namespace App\Enums;

enum SpecialNeeds: string
{
    case PHYSICAL_DISABILITY = '01';
    case HEALTH_IMPAIRMENT = '02';
    case HEARING_DISABILITY = '03';
    case HEARING_IMPAIRMENT = '04';
    case VISUAL_DISABILITY = '05';
    case VISUAL_IMPAIRMENT = '06';
    case MENTAL_DISABILITY = '07';
    case CEBERAL_PALSY = '08';
    case AUTISM = '09';
    case ADHD = '10';
    case LEARNING_DIFFICULTIES = '11';
    case SPEECH_LANGUAGE_DIFFICULTIES = '12';
    case SLOW_LEARNERNING = '13';
    case OTHER = '14';

    /**
     * @return array<string, string>
     */
    public function label(): array
    {
        return match ($this) {
            self::PHYSICAL_DISABILITY => ['id' => '1', 'special_needs_en' => 'Physical Disability', 'special_needs_ar' => 'إعاقة جسدية'],
            self::HEALTH_IMPAIRMENT => ['id' => '2', 'special_needs_en' => 'Health Impairment', 'special_needs_ar' => 'إعاقة صحية'],
            self::HEARING_DISABILITY => ['id' => '3', 'special_needs_en' => 'Hearing Disability', 'special_needs_ar' => 'إعاقة سمعية'],
            self::HEARING_IMPAIRMENT => ['id' => '4', 'special_needs_en' => 'Hearing Impairment', 'special_needs_ar' => 'ضعف سمع'],
            self::VISUAL_DISABILITY => ['id' => '5', 'special_needs_en' => 'Visual Disability', 'special_needs_ar' => 'إعاقة بصرية'],
            self::VISUAL_IMPAIRMENT => ['id' => '6', 'special_needs_en' => 'Visual Impairment', 'special_needs_ar' => 'ضعف بصر'],
            self::MENTAL_DISABILITY => ['id' => '7', 'special_needs_en' => 'Mental Disability', 'special_needs_ar' => 'إعاقة عقلية'],
            self::CEBERAL_PALSY => ['id' => '8', 'special_needs_en' => 'Cerebral Palsy', 'special_needs_ar' => 'شلل دماغي'],
            self::AUTISM => ['id' => '9', 'special_needs_en' => 'Autism', 'special_needs_ar' => 'توحد'],
            self::ADHD => ['id' => '10', 'special_needs_en' => 'ADHD', 'special_needs_ar' => 'فرط حركة وتشتت انتباه'],
            self::LEARNING_DIFFICULTIES => ['id' => '11', 'special_needs_en' => 'Learning Difficulties', 'special_needs_ar' => 'صعوبات التعلم'],
            self::SPEECH_LANGUAGE_DIFFICULTIES => ['id' => '12', 'special_needs_en' => 'Speech Language Difficulties', 'special_needs_ar' => 'صعوبات الكلام واللغة'],
            self::SLOW_LEARNERNING => ['id' => '13', 'special_needs_en' => 'Slow Learning', 'special_needs_ar' => 'بطئ تعلم'],
            self::OTHER => ['id' => '14', 'special_needs_en' => 'Other', 'special_needs_ar' => 'أخرى'],
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
