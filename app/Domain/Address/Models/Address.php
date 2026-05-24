<?php

declare(strict_types=1);

namespace App\Domain\Address\Models;

use App\Concerns\UserStamp;
use Database\Factories\AddressFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'employee_id',
    'short_address',
    'building_number',
    'street',
    'secondary_number',
    'district',
    'postal_code',
    'city',
    'created_by',
    'updated_by',
])]
#[Table('address_addresses')]
final class Address extends Model
{
    /** @use HasFactory<AddressFactory> */
    use HasFactory;

    /** @use UserStamp<Address> */
    use UserStamp;

    protected static function newFactory(): AddressFactory
    {
        return AddressFactory::new();
    }
}
