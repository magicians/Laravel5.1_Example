<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ArticleCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'intro' => 'required',
            'content' => 'required',
            'publish_date' => 'required',
            'publish_time' => 'required',
        ];
    }


    /**
     * Return the fields and values to create a new article from
     */
    public function articleFillData()
    {
        $user_id = Auth::id();
        $published_at = new Carbon(
            $this->publish_date . ' ' . $this->publish_time
        );

        return [
            'user_id' => $user_id,
            'title' => $this->title,
            'intro' => $this->intro,
            'page_image' => $this->page_image,
            'content' => $this->get('content'),
            'published_at' => $published_at,
            'is_checked' => (boolean)$this->is_checked,
            'is_draft' => (boolean)$this->is_draft,
        ];
    }
}
