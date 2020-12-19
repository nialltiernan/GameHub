<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $array)
 */
class ListGame extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_list_id',
        'game_id',
    ];

    public function list(): BelongsTo
    {
        return $this->belongsTo(ListGame::class);
    }
}
