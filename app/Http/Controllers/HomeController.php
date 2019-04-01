<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegistryTool;
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
    public function index()
    {
       return view('home');
    }

    public function search(Request $request)
    {  
        $find = $request->search;
        $categories = DB::table('categories')->where('name','LIKE','%' . $find . '%')->get(); 
        if(count($categories) == 0)
        {
            $registry = DB::table('registry_tools')->where('asset_name','LIKE','%' . $find . '%')->get();

            $result = $registry;

            return view('home',compact('result'));
        }
        else
        {   
            $result = $categories;
            return view('home',compact('result'));   
        }

    }
}
