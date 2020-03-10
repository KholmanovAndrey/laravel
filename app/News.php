<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 * @package App
 *
 * @property $title
 * @property $text
 * @property $category_id
 * @property $image
 */
class News extends Model
{
    protected $fillable = ['title', 'text', 'category_id', 'image'];

    public function getCategory()
    {
        return $this->belongsTo(Category::class, 'category_id')->first();
    }

    public static function rules()
    {
        $tableCategory = (new Category())->getTable();
        return [
            'title' => 'required|min:5|max:30',
            'text' => 'required',
            'category_id' => "required|exists:{$tableCategory},id",
            'image' => 'mimes:jpeg,bmp,png|max:1000'
        ];
    }
}
