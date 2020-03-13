<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App
 *
 * @property $title
 * @property $name
 */
class Category extends Model
{
    protected $fillable = ['title', 'name'];

    public function getNews()
    {
        return $this->hasMany(News::class, 'category_id');
    }

    public static function rules()
    {
        return [
            'title' => 'required',
            'name' => 'required',
        ];
    }
}
