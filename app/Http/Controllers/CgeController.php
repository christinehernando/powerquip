<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrows;
use Session;
use App\Borrows_InventoryTools;
use App\Stagings;

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

    public function generate_transaction_code()
    {
       $transaction_code = '';

        while($transaction_code == '')
        {
            $random_string = date('ymd').rand();
            $test = Borrows::all();
            $test_result = $test->where('transaction_code',$random_string);

            if($test_result->count() == 0)
            {
                $transaction_code = $random_string;
                return $transaction_code;
            } 

            return $transaction_code;
        }

    }



    public function store()
    {

        //generate transaction code
        $transaction_code = $this->generate_transaction_code();

        //get items in session cart
        $cart = session()->get('cart');

        //get user id logged in
        $user = auth()->user();

        //populate the borrows table
        $borrow = new Borrows;

        $borrow->transaction_code = $transaction_code;
        $borrow->user_id = $user->id;
        $borrow->status = "reserved";

        $borrow->save();

        $borrow_id = Borrows::where('transaction_code',$transaction_code)->first();

        //populate the borrows__inventory tools table and delete items in staging 
        $stage = Stagings::all();

        foreach ($cart as $key => $item) {

            $borrow_details = new Borrows_InventoryTools;

            $borrow_details->inventory_tool_id = $item['inventory_tool_id'];
            $borrow_details->borrow_id = $borrow_id->id;
            $borrow_details->status = "reserved";

            $borrow_details->save();

            foreach($stage as $tool){
                if($tool->tool_serial == $item['serial']){
                    $tool->delete();
                }
            }

        }

        //empty out session cart
        session()->forget('cart');

        //redirect to accounts blade
        
        return redirect('/account');
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

        return redirect('/account');
    }

     public function return($id)
    {
        
        $borrow = Borrows::find($id);

        $borrow->status = "returned";

        $borrow->save();

        //push status of details of borrows to borrows_inventory
        $details = Borrows_InventoryTools::where('borrow_id', $borrow->id)->get();

        foreach ($details as $index => $tool) {
            $detail = Borrows_InventoryTools::find($tool->id);
            $detail->status = "returned";
            $detail->save();
        }

        return redirect('/account');
    }


}
