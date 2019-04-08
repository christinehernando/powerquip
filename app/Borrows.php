<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrows extends Model
{
    //
    use SoftDeletes;

    /* RELATIONSHP */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function inventory_tools()
    {
        return $this->hasMany('App\Borrows_InventoryTools', 'borrow_id');
    }
}
