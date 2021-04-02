<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\BlogView
 *
 * @property int $id
 * @property int $blog_id
 * @property string $ip
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Blog $blog
 * @method static \Database\Factories\BlogViewFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogView newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogView newQuery()
 * @method static \Illuminate\Database\Query\Builder|BlogView onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogView query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogView whereBlogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogView whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogView whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogView whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogView whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogView whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|BlogView withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BlogView withoutTrashed()
 * @mixin \Eloquent
 */
class BlogView extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected $fillable = ['blog_id', 'ip'];
    protected $guarded = [];

    protected static $logName = "BlogView";

    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }
}
