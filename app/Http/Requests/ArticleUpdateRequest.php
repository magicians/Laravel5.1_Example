<?php

namespace App\Http\Requests;

use App\Article;

class ArticleUpdateRequest extends ArticleCreateRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $articleId = $this->route('article');
        $isChecked = Article::select('is_checked')->where('id', $articleId)->first();
        return $isChecked->is_checked !== 1;
    }
}