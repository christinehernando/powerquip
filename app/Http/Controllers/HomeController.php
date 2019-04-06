<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegistryTool;
use App\InventoryTools;
use App\Category;
use DB;
use App\Quotation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $find = $request->input('search');

        //join table resulting table will only reflect all items of the registry_tools
        $result = DB::table('categories')
            ->join('registry_tools','categories.id','=','registry_tools.category_id')
            ->select('categories.*','registry_tools.*')
            ->where('name','LIKE','%' . $find . '%')
            ->get();

        $tools = DB::table('inventory_tools')
            ->join('registry_tools','inventory_tools.id','=','inventory_tools.registry_tool_id')
            ->select('inventory_tools.*','registry_tools.*')
            ->get();

        $test = InventoryTools::select('tool_serial')->distinct()->get();

        


       return view('home',compact('result','tools'));   

    }

}


