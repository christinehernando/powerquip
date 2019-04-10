<?php

namespace App\Http\Controllers;

use App\InventoryTools;
use App\RegistryTool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function generate_tool_serial()
    {
       $tool_serial = '';

        while($tool_serial == '')
        {
            $random_string = date('ymd').rand();
            $test = InventoryTools::all();
            $test_result = $test->where('tool_serial',$random_string);

            if($test_result->count() == 0)
            {
                $tool_serial = $random_string;
                return $tool_serial;
            } 

            return $tool_serial;
        }

    }

    public function add($id)
    {
     
        $tool_serial = $this->generate_tool_serial();

        $registryTools = RegistryTool::all();

        $tool_name = RegistryTool::find($id);

          return view('inventorytools.add_inventorytools',compact('id','tool_serial','registryTools','tool_name'));

    }

    public function store(Request $request)
    {
        //

        $validatedData = $request->validate([
            'add_inventorytool_registry_tool_id' => ['required'],
            'add_inventorytool_name' => ['required'],
        ]);

        $tool = new InventoryTools;

        $tool->tool_serial = $request->add_inventorytool_name;
        $tool->registry_tool_id = $request->add_inventorytool_registry_tool_id;

        $tool->save();

        return redirect('/inventorytools');
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
    public function update(Request $request, $id)
    {
        $tool = InventoryTools::find($id);

        $tool->status = $request->inventorytools_update_to;
        $tool->save();

        return redirect('/inventorytools');
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
