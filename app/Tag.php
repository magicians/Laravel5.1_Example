<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'show_index'];

    /*
     * @return BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany('App\Article', 'article_tag');
    }
}
