<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static whereName(string $string)
 */
class Affiliate extends Model
{
    use HasFactory;

    public function links(): HasMany
    {
        return $this->hasMany(AffiliateLink::class);
    }
}
