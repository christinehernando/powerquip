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

        $tool_results = [];
        
        foreach($tools as $tool)
        {
            $total = 0;
            $available = 0;

            foreach ($counts as $count) {
                if($count->registry_tool_id = $tool->id){
                    $total++;
                    if($count->status != "reserved" && $count->status != "borrowed"){
                        $available++;
                    }
                }

            }

            array_push($tool_results,$tool->id);
            foreach($tool_results as $tool_result){
                if($tool_result == $tool->id){
                    array_push($tool->id,'image' => $tool->image_path)
                    $tool_result += ['image' => $tool->image_path];    
                    $tool_result += ['description' => $tool->description];    
                    $tool_result += ['total' => $total];    
                    $tool_result += ['available' => $available];    
                }
            }
        }
        
        $results = collect($tool_results);

        dd($results);


            

       return view('home',compact('tools','counts','total','available'));   

    }

}


