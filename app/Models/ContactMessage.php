<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\ContactMessage
 *
 * @method static \Database\Factories\ContactMessageFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactMessage query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ContactMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactMessage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactMessage whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactMessage whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactMessage whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactMessage whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Query\Builder|ContactMessage onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|ContactMessage withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ContactMessage withoutTrashed()
 */
class ContactMessage extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected $fillable = [
        'email',
        'subject',
        'message',
    ];
}
