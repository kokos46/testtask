<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Url;

/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UrlStatistics newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UrlStatistics newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UrlStatistics query()
 * @mixin \Eloquent
 */
class UrlStatistics extends Model
{
    public function url(): BelongsTo
    {
        return $this->belongsTo(Url::class);
    }
}
