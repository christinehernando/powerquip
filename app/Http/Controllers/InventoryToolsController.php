<?php

namespace App\Http\Controllers;

use App\InventoryTools;
use App\RegistryTool;
use Illuminate\Http\Request;

class InventoryToolsController extends Controller
{   
    public function __construct()
    {
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

        $registryTools = RegistryTool::with('inventorytools')->get();
        
        return view ('inventorytools.inventorytools_list',compact('registryTools'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InventoryTools  $inventoryTools
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryTools $inventoryTools)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InventoryTools  $inventoryTools
     * @return \Illuminate\Http\Response
     */
    public function edit(InventoryTools $inventoryTools)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InventoryTools  $inventoryTools
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InventoryTools $inventoryTools)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InventoryTools  $inventoryTools
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryTools $inventoryTools)
    {
        //
    }
}
