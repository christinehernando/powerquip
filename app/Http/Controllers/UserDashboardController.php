<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrows;

use Session;
use App\Borrows_InventoryTools;
use App\InventoryTools;
use App\Stagings;
use App\User;

class UserDashboardController extends Controller
{
    public function __construct()
    {
        /*
            - add a middleware with an argument of 'is.admin'
                - $this->?('?');
        */
        $this->middleware('is.user');
    }

	public function index()
    {
        //get items in session cart
    	$cart = session()->get('cart');
        $counter = 0;

        $forApproval = Borrows::where('status',"reserved")->get();
        $forDelivery = Borrows::where('status',"approved")->get();
        $forReturn = Borrows::where('status',"delivered")->get();
        $return = Borrows::where('status',"returned")->get();
        $detail = Borrows_InventoryTools::with('borrows');

        return view ('accounts.account',compact('cart','counter','forApproval','forDelivery','forReturn','return','detail'));
    }
    
     public function deliver($id)
    {
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

        return back();
    }
}
