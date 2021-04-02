<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class BlogComment extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected $fillable = [
        'blog_id',
        'name',
        'email',
        'website',
        'comment',
    ];

    protected $guarded = [];

    protected static $logName = "Blog";

    /**
     * Blog of current comment belong to
     *
     * @return BelongsTo
     */
    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }
}
