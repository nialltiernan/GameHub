<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $array)
 * @method static whereAffiliateId(int $int)
 * @method static whereNotIn(string $string, array $importedLinkIds)
 * @method static truncate()
 */
class AffiliateLink extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'keywords' => 'array',
        'image' => 'array',
        'promotion' => 'array',
    ];

    public function affiliate(): BelongsTo
    {
        return $this->belongsTo(Affiliate::class);
    }
}
