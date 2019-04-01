<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrows extends Model
{
    //
    use SoftDeletes;

    /* RELATIONSHP */
    public function users()
    {
    	return $this->belongsTo('App\Users');
    }

    public function borrows_inventorytools()
    {
        return $this->hasMany('App\Borrows_InventoryTools','inventory_tool_id');
    }
}
