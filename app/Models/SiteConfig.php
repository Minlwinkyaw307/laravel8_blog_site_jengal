<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\SiteConfig
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read string $logo_url
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig newQuery()
 * @method static \Illuminate\Database\Query\Builder|SiteConfig onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig query()
 * @method static \Illuminate\Database\Query\Builder|SiteConfig withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SiteConfig withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property string $logo
 * @property string $facebook
 * @property string $twitter
 * @property string $google
 * @property string $github
 * @property string $policy
 * @property string $about
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $contact_message
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereContactMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereGithub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereGoogle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig wherePolicy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereUpdatedAt($value)
 */
class SiteConfig extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected $fillable = [
        'logo',
        'facebook',
        'twitter',
        'google',
        'github',
        'policy',
        'about',
        'email',
        'phone',
        'address',
        'contact_message',
    ];


    /**
     * Return logo url
     *
     * @return string
     */
    public function getLogoUrlAttribute(): string
    {
        if($this->logo) {
            return Storage::url($this->logo);
        }
        return url('blog/') . "/img/logo.png";
    }
}
