<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\BlogStatus
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @method static \Database\Factories\BlogStatusFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogStatus newQuery()
 * @method static \Illuminate\Database\Query\Builder|BlogStatus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|BlogStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BlogStatus withoutTrashed()
 * @mixin \Eloquent
 * @property string $color
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Blog[] $blogs
 * @property-read int|null $blogs_count
 * @method static \Illuminate\Database\Eloquent\Builder|BlogStatus whereColor($value)
 */
class BlogStatus extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected $fillable = ['name'];

    protected $guarded = [];

    protected static $logName = "BlogStatus";

    /**
     * Return all the blogs with current status id
     *
     * @return HasMany
     */
    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class);
    }
}
