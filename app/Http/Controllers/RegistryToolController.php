<?php

namespace App\Http\Controllers;

use App\RegistryTool;
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RegistryTool  $registryTool
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistryTool $registryTool)
    {
        //
    }
}
