@extends('layouts.app')

@section('title')
	Tools Inventory
@endsection

@section('content')
<div class="container">
	<h1>Tools Inventory</h1>
	<a href="{{ route('inventorytools.create') }}" class="btn btn-primary float-right">
		Add New Tool
	</a>

	@forelse ($inventoryTools as $inventoryTool)
		<h2> {{ $inventoryTool }} </h2>
		<hr>
	@empty

	@endforelse



	
@endsection