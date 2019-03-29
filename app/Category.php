<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    use SoftDeletes;

    /*
		-add a protected property called $dates
		-$dates should be an array and has one element: 'deleted_at'
    */

	protected $fillable = [
        'category_name',
        'category_description', 
    ];

    protected $dates = ['deleted_at'];


}
