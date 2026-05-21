<?php

declare(strict_types=1);

namespace App\Domain\Identity\Models;

use App\Concerns\UserStamp;
use Database\Factories\IdentityFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'employee_id',
    'identity_type_id',
    'identity_number',
    'place_of_issue',
    'issue_date',
    'expiry_date',
    'created_by',
    'updated_by',
])]
#[Table('identity_identities')]
final class Identity extends Model
{
    /** @use HasFactory<IdentityFactory> */
    use HasFactory;

    /** @use UserStamp<Identity> */
    use UserStamp;

    protected static function newFactory(): IdentityFactory
    {
        return IdentityFactory::new();
    }

    protected function casts(): array
    {
        return [
            'issue_date' => 'immutable_datetime',
            'expiry_date' => 'immutable_datetime',
        ];
    }
}
