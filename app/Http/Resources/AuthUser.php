<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\User
 */
class AuthUser extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): ?array
    {
        return [
            'user_id' => $this->id,
            'email' => $this->email,
            'employee_id' => ($this->whenLoaded('employee'))->id,
            'empid' => ($this->whenLoaded('employee'))->code,
            'name_en' => ($this->whenLoaded('employee'))->english_name,
            'name_ar' => ($this->whenLoaded('employee'))->arabic_name,
            'roles' => $this->roles->pluck('name'),
            'permissions' => $this->permissions->pluck('name'),
        ];
    }
}
