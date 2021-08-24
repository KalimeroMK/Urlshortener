<?php

    namespace App\Models;

    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Carbon;
    use LaravelIdea\Helper\App\Models\_IH_ShortLink_C;

    /**
 * App\Models\ShortLink
 *
 * @property int $id
 * @property string $url
 * @property string $short_url
 * @property int $clicks
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ShortLink newModelQuery()
 * @method static Builder|ShortLink newQuery()
 * @method static Builder|ShortLink query()
 * @method static Builder|ShortLink whereClicks($value)
 * @method static Builder|ShortLink whereCreatedAt($value)
 * @method static Builder|ShortLink whereId($value)
 * @method static Builder|ShortLink whereShortUrl($value)
 * @method static Builder|ShortLink whereUpdatedAt($value)
 * @method static Builder|ShortLink whereUrl($value)
 * @mixin Eloquent
 * @property int $safe
 * @method static Builder|ShortLink whereSafe($value)
 */
    class ShortLink extends Model
    {
        /**
         * The attributes that are mass assignable.
         *
         * @var string[]
         */
        protected $fillable = [
            'url',
            'short_url',
            'clicks',
            'safe',
        ];

        /**
         * @return ShortLink[]|_IH_ShortLink_C
         */
        public static function popular()
        {
            return ShortLink::orderByDesc('clicks')->take(100)->get();
        }
    }