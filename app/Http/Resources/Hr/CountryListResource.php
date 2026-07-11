<?php

declare(strict_types=1);

namespace App\Http\Resources\Hr;

use App\Domain\Shared\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Country
 */
final class CountryListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => app()->getLocale() === 'en' ? 'name_en' : 'name_ar',
        ];
    }
}
