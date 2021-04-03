<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Blog
 *
 * @property int $id
 * @property string $thumbnail
 * @property string $image
 * @property string $title
 * @property string $content
 * @property int $blog_status_id
 * @property int $category_id
 * @property string $published_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @method static \Database\Factories\BlogFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Query\Builder|Blog onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereBlogStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Blog withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Blog withoutTrashed()
 * @mixin \Eloquent
 * @property int $user_id
 * @property string $slug
 * @property int $is_featured
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BlogComment[] $blog_comments
 * @property-read int|null $blog_comments_count
 * @property-read \App\Models\BlogStatus $blog_status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BlogView[] $blog_views
 * @property-read int|null $blog_views_count
 * @property-read \App\Models\Category $category
 * @property-read string $image_url
 * @property-read string $thumbnail_url
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUserId($value)
 */
class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected $fillable = [
        'thumbnail',
        'image',
        'title',
        'slug',
        'content',
        'blog_status_id',
        'category_id',
        'published_at',
        'user_id',
        'is_featured',
    ];

    protected $appends = ['thumbnailUrl', 'imageUrl'];

    protected $guarded = [];

    protected static $logName = "Blog";


    /**
     * Return Thumbnail as Url
     *
     * @return string
     */
    public function getThumbnailUrlAttribute(): string
    {
        if($this->thumbnail) {
            return Storage::url($this->thumbnail);
        }
        // To dev purpose;
        $random_width = rand(725, 750);
        $random_height = rand(425, 450);
        return "https://picsum.photos/$random_width/$random_height/";
    }

    /**
     * Return Image as url
     *
     * @return string
     */
    public function getImageUrlAttribute(): string
    {
        if($this->image) {
            return Storage::url($this->image);
        }
        // To dev purpose;
        $random_width = rand(725, 750);
        $random_height = rand(425, 450);
        return "https://picsum.photos/$random_width/$random_height/";
    }

    /**
     * Return creator information (From User Model)
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Return blog's status row of current blog
     *
     * @return BelongsTo
     */
    public function blog_status(): BelongsTo
    {
        return $this->belongsTo(BlogStatus::class);
    }

    /**
     * Return blog's category row of current blog
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Return all the blog views of current blog
     *
     * @return HasMany
     */
    public function blog_views(): HasMany
    {
        return $this->hasMany(BlogView::class);
    }

    /**
     * Return all the blog comments of current blog
     *
     * @return HasMany
     */
    public function blog_comments(): HasMany
    {
        return $this->hasMany(BlogComment::class);
    }

}
