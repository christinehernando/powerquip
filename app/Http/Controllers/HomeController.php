<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegistryTool;
use App\InventoryTools;
use App\Category;
use DB;
use Session;
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
        $tools = DB::table('categories')
            ->join('registry_tools','categories.id','=','registry_tools.category_id')
            ->select('categories.*','registry_tools.*')
            ->where('name','LIKE','%' . $find . '%')
            ->get();




        $counts = DB::table('inventory_tools')
            ->join('registry_tools','inventory_tools.registry_tool_id','=','registry_tools.id')
            ->leftJoin('borrows__inventory_tools','inventory_tools.id','=','borrows__inventory_tools.inventory_tool_id')
            ->select('inventory_tools.*','registry_tools.*','borrows__inventory_tools.*')
            ->where('inventory_tools.status','=','functioning')
            ->get();

        $results = [];
        
        foreach($tools as $tool)
        {
            $total = 0;
            $available = 0;  

            foreach ($counts as $count)
            {
                if($count->registry_tool_id == $tool->id)
                {
                    $total++;

                    if($count->status != "reserved" && $count->status != "borrowed")
                    {
                        //insert another checking if the tool serial is in session cart 
                        $available++;
                    }                    
                }
            }

            if(!$available == 0)
            {
                $results[$tool->id] = [
                "id" => $tool->id,
                "name" => $tool->asset_name,
                "image" => $tool->image_path,
                "description" => $tool->description,
                "available" => $available,
                "total" => $total,
                ]; 
            }
             
        }

        $returns = collect($results);   

        $cart = Session::get('cart');  

        dd(Session::all());     
        
        return view('home',compact('returns'));   
    }
}


