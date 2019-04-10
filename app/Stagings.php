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

    public function deliver($id)
    {
        dd("nakakarating");
        $borrow = Borrows::find($id);

        $borrow->status = "delivered";

        $borrow->save();

        //push status of details of borrows to borrows_inventory
        $details = Borrows_InventoryTools::where('borrow_id', $borrow->id)->get();

        foreach ($details as $index => $tool) {
            $detail = Borrows_InventoryTools::find($tool->id);
            $detail->status = "delivered";
            $detail->save();
        }

        return redirect('/account');
    }


}
