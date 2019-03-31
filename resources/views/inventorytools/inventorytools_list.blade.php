@extends('layouts.app')

@section('title')
	Tools Inventory
@endsection

@section('content')
<div class="container">
	<h1 class="text-center">Tools Inventory</h1>
	

	@forelse ($registryTools as $inventoryTools)
		<h3 style="display: inline-block;"> {{ ucfirst($inventoryTools->asset_name) }} </h3>
		<a href="{{ route('inventorytools.create') }}" class="btn btn-primary float-right ">
			<i class="fas fa-plus"></i>
		</a>
		
		@if(empty($inventoryTools->inventorytools) || is_null($inventoryTools->inventorytools))
			<p> No tools to show.</p>
		@else
			<table class="table table-striped table-bordered">
			<thead>
				<tr class="text-center">
					<th>No</th>
					<th>Tool Serial</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>

				@forelse ($inventoryTools->inventorytools as $index => $tool)

					<tr>
						<td class="text-center"> {{ ++$index }} </td>
						<td> {{ $tool->tool_serial }} </td>
						<td> {{ $tool->status }} </td>
					</tr>
				@empty
					<tr>
						<td colspan="3" class="text-center"> No tools to show.</td>
					</tr>
				@endforelse
				
			</tbody>
		</table>	
		<hr>
		@endif
		
	@empty

	@endforelse



	
@endsection