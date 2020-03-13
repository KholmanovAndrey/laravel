<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    protected $fillable = ['link'];

    public static function rules()
    {
        return [
            'link' => 'required|min:5|max:250',
        ];
    }
}
