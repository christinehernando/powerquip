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
    public function __construct()
    {
        /*
            - add a middleware with an argument of 'is.admin'
                - $this->?('?');
        */
        $this->middleware('is.admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $forApproval = Borrows::where('status',"reserved")->get();
        $forDelivery = Borrows::where('status',"approved")->get();
        $forReturn = Borrows::where('status',"delivered")->get();
        $return = Borrows::where('status',"returned")->get();
        $detail = Borrows_InventoryTools::with('borrows');

        return view ('admin',compact('forApproval','forDelivery','forReturn','return','detail'));
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

    public function approve($id)
    {
        //update status of borrows table
        $borrow = Borrows::find($id);

        $borrow->status = "approved";

        $borrow->save();

        //push status of details of borrows to borrows_inventory
        $details = Borrows_InventoryTools::where('borrow_id', $borrow->id)->get();

        foreach ($details as $index => $tool) {
            $detail = Borrows_InventoryTools::find($tool->id);
            $detail->status = "approved";
            $detail->save();
        }

        

        return back();
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

        return back();
    }
}
