<?php

namespace App\Http\Controllers;

use App\RegistryTool;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegistryToolController extends Controller
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
        // $tools = RegistryTool::with('category')->get();
        $tools = RegistryTool::all();
        return view('registrytools.registrytool_list', compact('tools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $categories = Category::all();

        return view('registrytools.add_registrytools',compact('categories'));
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

        $validatedData = $request->validate([
            'registrytool_name' => ['required', 'string'],
            'registrytool_description' => ['required', 'string'],
            'registrytool_image' => ['required', 'string'],
            'registrytool_category' => ['required'],
        ]);

        $registrytool = new RegistryTool;

        $registrytool->asset_name = $request->registrytool_name;
        $registrytool->description = $request->registrytool_description;
        $registrytool->image_path = $request->registrytool_image;
        $registrytool->category_id = $request->registrytool_category;

        $registrytool->save();

        return redirect('/registrytool');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RegistryTool  $registryTool
     * @return \Illuminate\Http\Response
     */
    public function show(RegistryTool $registryTool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RegistryTool  $registryTool
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistryTool $registryTool)
    {
        //
        return view('registrytools.edit_registrytools', compact('registryTool'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RegistryTool  $registryTool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistryTool $registryTool)
    {
        //
        $validatedData = $request->validate([
            'registrytool_name' => ['required', 'string'],
            'registrytool_description' => ['required', 'string'],
            'registrytool_image' => ['required', 'string'],
            'registrytool_category' => ['required'],
        ]);

        $registrytool->asset_name = $request->registrytool_name;
        $registrytool->description = $request->registrytool_description;
        $registrytool->image_path = $request->registrytool_image;
        $registrytool->category_id = $request->registrytool_category;

        $registrytool->save();

        return redirect('/registrytool');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RegistryTool  $registryTool
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistryTool $registryTool)
    {
        // //
        // $registryTool = RegistryTool::find($registryTool->id);

        dd($registryTool);

        $registryTool->status = "0";
        
        $registryTool->save();

        return back();
    }

    public function activate($id)
    {
        /*
            - selectively query the User model using the find() method with the passed $id as its argument. Save the result as a variable named $user
                - $user = ?::?(?);

            - set the status property of $user to be equal to 1
                - $user->? = '?';

            - use the save() method on $user
                - $user->?();

            - redirect to  '/users'
                - return ?('?');
        */

        $tool = RegistryTool::find($id);

        $tool->status = "1";

        $tool->save();

        return back();

    }
}
