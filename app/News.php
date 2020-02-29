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
}
