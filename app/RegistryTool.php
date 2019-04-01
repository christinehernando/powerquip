<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class RegistryTool extends Model
{
    //
     use SoftDeletes;

    //  protected $fillable = [
    //    name in db 
    // ];

    protected $fillable = [
        'asset_name',
        'category_id',
        'image_path',
        'description', 
    ];

    protected $dates = ['deleted_at'];

    /* RELATIONSHP */

    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }   

    public function inventorytools()
    {
        return $this->hasMany('App\InventoryTools');
    } 

    
}
