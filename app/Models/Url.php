<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\UrlStatistics;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static \Database\Factories\urlFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|url newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|url newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|url query()
 * @mixin \Eloquent
 */
class Url extends Model
{
    /** @use HasFactory<\Database\Factories\UrlFactory> */
    use HasFactory;

    public function urlStatistics(): HasMany
    {
        return $this->hasMany(UrlStatistics::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'source_url',
        'short_url',
        'user_id'
    ];
}
