<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stagings extends Model
{
    //
	public function InventoryTools()
    {
        return $this->hasOne('App\InventoryTools','inventory_tool_id');
    }
}
