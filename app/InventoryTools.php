<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryTools extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'registry_tool_id',
        'tool_serial' 
    ];

    protected $dates = ['deleted_at'];

    /* RELATIONSHP */ 

    public function registrytool()
    {
        return $this->belongsTo('App\RegistryTool','registry_tool_id');
    }

    public function borrows_inventorytools()
    {
        return $this->hasMany('App\Borrows_InventoryTools','inventory_tool_id');
    }
}
