<?php

namespace App\Models;

use App\Enums\AffiliateLinkTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $array)
 * @method static whereAffiliateId(int $int)
 * @method static whereNotIn(string $string, array $importedLinkIds)
 * @method static truncate()
 * @method static updateOrCreate(array|string[] $array, array $array1)
 * @method static where(string $string, int $int)
 */
class AffiliateLink extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'keywords' => 'array',
        'image' => 'array',
        'promotion_start' => 'datetime',
        'promotion_end' => 'datetime',
    ];

    public function affiliate(): BelongsTo
    {
        return $this->belongsTo(Affiliate::class);
    }

    public static function banner(array $allowedShapes, string $franchise = null): ?self
    {
        if ($franchise) {
            $franchiseLinks = self::where('type', AffiliateLinkTypes::BANNER)
                ->where('is_active', true)
                ->whereIn('image->shape', $allowedShapes)
                ->whereJsonContains('keywords', $franchise)
                ->get();

            if ($franchiseLinks->isNotEmpty()) {
                return $franchiseLinks->random();
            }
        }

        $links = self::where('type', AffiliateLinkTypes::BANNER)
            ->where('is_active', true)
            ->whereIn('image->shape', $allowedShapes)
            ->get();

        if ($links->isNotEmpty()) {
            return $links->random();
        }

        return null;
    }
}
