<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Borrows_InventoryTools extends Model
{
    //
    use SoftDeletes;

    /* RELATIONSHP */

	public function inventorytools()
	{
		return $this->belongsTo('App\InventoryTools','inventory_tool_id');
	}

	public function borrows()
	{
		return $this->belongsTo('App\Borrows');
	}



}
