<?php

namespace App\Enums;

enum JobStatus: string
{
    case ACTIVE = '1';
    case INACTIVE = '2';

    /**
     * @return array<string, string>
     */
    public function label(): array
    {
        return match ($this) {
            self::ACTIVE => ['id' => '1', 'name' => app()->getLocale() == 'en' ? 'Active' : 'نشط'],
            self::INACTIVE => ['id' => '0', 'name' => app()->getLocale() == 'en' ? 'Inactive' : 'غير نشط'],
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
