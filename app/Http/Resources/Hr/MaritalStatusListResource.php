<?php

declare(strict_types=1);

namespace App\Http\Resources\Hr;

use App\Domain\Shared\Models\MaritalStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin MaritalStatus
 */
final class MaritalStatusListResource extends JsonResource
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
            'name' => $this->getTranslation('name', app()->getLocale()),
        ];
    }
}
