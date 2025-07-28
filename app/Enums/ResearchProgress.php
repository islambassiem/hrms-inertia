<?php

namespace App\Enums;

enum ResearchProgress: string
{
    case FINISHED = '1';
    case IN_PROGRESS = '2';
    case APPROVED = '3';

    /**
     * @return array<string, string>
     */
    public function label(): array
    {
        return match ($this) {
            self::FINISHED => ['id' => '1', 'progress_en' => 'Finished', 'progress_ar' => 'منجز'],
            self::IN_PROGRESS => ['id' => '2', 'progress_en' => 'In Progress', 'progress_ar' => 'جاري تنفيذه'],
            self::APPROVED => ['id' => '3', 'progress_en' => 'Approved and has not started', 'progress_ar' => 'موافق عليه ولم يبدأ'],
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
