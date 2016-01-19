<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

use App\Services\Markdowner;

class Article extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'intro',
        'content_mark',
        'published_at',
        'is_checked',
        'is_draft',
    ];

    protected $dates = ['published_at']; //carbon objects;

    /**
     * The many-to-many relationship between articles and tags.
     *
     * @return BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'article_tag')->withTimestamps();
    }


    /**
     * An article is owned by a user.
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Sync tag relation adding new tags as needed
     *
     * @param array $tagsID
     */
    public function syncTags(array $tagsID)
    {
        if (count($tagsID)) {
            $this->tags()->sync($tagsID);
            return;
        }
        $this->tags()->detach();
    }

    /*
     * Return the article which after the set time
     */
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    /**
     * Set the content automatically when the content_mark is set
     *
     * @param string $value
     */
    public function setContentMarkAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['content_mark'] = $value;
        $this->attributes['content'] = $markdown->toHTML($value);
    }


    /**
     * Return the date portion of published_at
     */
    public function getPublishDateAttribute($value)
    {
        return $this->published_at->format('M-j-Y');
    }

    /**
     * Return the time portion of published_at
     */
    public function getPublishTimeAttribute($value)
    {
        return $this->published_at->format('H:i');
    }
}