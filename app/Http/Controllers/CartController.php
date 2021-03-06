<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\RegistryTool;
use App\InventoryTools;
use App\Category;
use App\Stagings;
use DB;


class CartController extends Controller
{
    //

    public function index () 
    {
         $cart = session()->get('cart');

         $counter = 0;

         return view('accounts.account',compact('cart','counter'));  
    }

    public function store(Request $request, $registry_tool_id)
    {
        
    	$find = $registry_tool_id;

    	

        //join table resulting table will only reflect all items of the registry_tools
        $tools = DB::table('categories')
            ->join('registry_tools','categories.id','=','registry_tools.category_id')
            ->select('categories.*','registry_tools.*')
            ->where('registry_tools.id','=', $find )
            ->get();

        $counts = DB::table('inventory_tools')
            ->join('registry_tools','inventory_tools.registry_tool_id','=','registry_tools.id')
            ->leftJoin('borrows__inventory_tools','inventory_tools.id','=','borrows__inventory_tools.inventory_tool_id')
            ->select('inventory_tools.*','registry_tools.*','borrows__inventory_tools.*')
            ->where('inventory_tools.status','=','functioning')
            ->get();

        $stage = Stagings::all();

        $cart = session()->get('cart');

        $inventory_tools = InventoryTools::all();

        
        

       	//loop thru until we have one item that matches the registrytool_id 

       	$found = 0;

        foreach($tools as $tool) 
        {
        	foreach($counts as $count) 
        	{
        		if($count->registry_tool_id == $tool->id)
        		{
                    if($stage->containsStrict('tool_serial',$count->tool_serial) || $found > 0 )
                    {
                        $found = 0;
                    }
                    else
                    {
                        $found = 1;
                        $addtostaging = new Stagings;

                        foreach($inventory_tools as $inventory_tool) {
                            if($inventory_tool->tool_serial == $count->tool_serial){
                                $tool_id = $inventory_tool->id; 
                            }
                        }

                        $addtostaging->tool_serial = $count->tool_serial;
                        $addtostaging->inventory_tool_id = $tool_id;
                        $addtostaging->status = "in cart";

                        $addtostaging->save();

                        $cart = session()->get('cart');

                        // if cart is empty then this the first product
                        if(!$cart) {
                 
                            $cart = [ 
                                    $count->tool_serial => [
                                        "name" => $tool->asset_name,
                                        "serial"=>$count->tool_serial,
                                        "category"=>$tool->name,
                                        "image"=>$tool->image_path,
                                        "quantity" => 1,
                                        "inventory_tool_id" => $tool_id
                                    ] 

                            ];
                 
                            session()->put('cart', $cart);
                 
                            return redirect('/home');
                        }

                        // if cart not empty then check if this product exist then increment quantity
                        if(isset($cart[$count->tool_serial])) {

                            $cart[$count->tool_serial] = [
                                        "name" => $tool->asset_name,
                                        "serial"=>$count->tool_serial,
                                        "category"=>$tool->name,
                                        "image"=>$tool->image_path,
                                        "quantity" => 1,
                                        "inventory_tool_id" => $tool_id
                            ];

                            session()->put('cart', $cart);

                            return redirect('/home');

                        }

                         // if item not exist in cart then add to cart with quantity = 1
                       $cart[$count->tool_serial] = [
                                        "name" => $tool->asset_name,
                                        "serial"=>$count->tool_serial,
                                        "category"=>$tool->name,
                                        "image"=>$tool->image_path,
                                        "quantity" => 1,
                                        "inventory_tool_id" => $tool_id
                            ];

                        session()->put('cart', $cart);

                        return redirect('/home');



                    }
                    
                   
        				
        		}
        	}
        }

    }
}
