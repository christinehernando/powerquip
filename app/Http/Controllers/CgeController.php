<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrows;
use Session;
use App\Borrows_InventoryTools;

class CgeController extends Controller
{
    //

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
}
