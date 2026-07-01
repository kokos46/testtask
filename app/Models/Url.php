<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Database\Factories\urlFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|url newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|url newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|url query()
 * @mixin \Eloquent
 */
class url extends Model
{
    /** @use HasFactory<\Database\Factories\UrlFactory> */
    use HasFactory;
}
