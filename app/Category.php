<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App
 *
 * @property title
 * @property name
 */
class Category extends Model
{
    protected $fillable = ['title', 'name'];
}
