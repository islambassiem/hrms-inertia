<?php

namespace App\Enums;

enum VacationClass: int
{
    case THIRTY = 30;
    case TWENTY_ONE = 21;
    case ZERO = 0;

    public function label(): int
    {
        return match ($this) {
            self::THIRTY => 30,
            self::TWENTY_ONE => 21,
            self::ZERO => 0,
        };
    }

    /**
     * @return array<int>
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
