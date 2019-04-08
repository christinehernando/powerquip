<?php

namespace App\Http\Controllers;

use App\Borrows;
use Illuminate\Http\Request;

use Session;
use App\Borrows_InventoryTools;
use App\InventoryTools;
use App\Stagings;
use App\User;

class BorrowsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $borrows = Borrows::all();
        $detail = Borrows_InventoryTools::with('borrows');

        return view ('admin',compact('borrows','detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        
        return redirect('/cart');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Borrows  $borrows
     * @return \Illuminate\Http\Response
     */
    public function show(Borrows $borrows)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Borrows  $borrows
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrows $borrows)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Borrows  $borrows
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrows $borrows)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Borrows  $borrows
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrows $borrows)
    {
        //
    }
}
