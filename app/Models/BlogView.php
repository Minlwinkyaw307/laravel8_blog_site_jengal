<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

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
