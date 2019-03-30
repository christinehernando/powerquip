<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class RegistryTool extends Model
{
    //
     use SoftDeletes;

    //  protected $fillable = [
    //    name in the form of add blade 
    // ];

    protected $fillable = [
        'asset_name',
        'category_id',
        'image_path',
        'description', 
    ];

    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }    

    
}
