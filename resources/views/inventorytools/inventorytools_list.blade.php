@extends('layouts.app')

@section('title')
	Tools Inventory
@endsection

@section('content')
<div class="container">
	<h1 class="text-center mb-4">Tools Inventory</h1>
	

	@forelse ($registryTools as $inventoryTools)
		<h3 style="display: inline-block;"> {{ ucfirst($inventoryTools->asset_name) }} </h3>
		
		<a href="/inventorytools/{{ $inventoryTools->id }}/add" class="btn btn-primary float-right mr-3 ">
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
					<th></th>
				</tr>
			</thead>
			<tbody>

				@forelse ($inventoryTools->inventorytools as $index => $tool)

					<tr>
						<td class="text-center"> {{ ++$index }}</td>
						<td hidden> {{{ $tool->id}}} </td>
						<td> {{ $tool->tool_serial }}</td>
						<td> {{ ucfirst($tool->status) }}</td>
						<td><button type="button" class="inventorytools-btn btn btn-primary float-right" data-toggle="modal" data-target="#updateInventoryToolStatus"><i class="fas fa-edit"> </i></button> </td>

					</tr>
				@empty
					<tr>
						<td colspan="4" class="text-center"> No tools to show.</td>
					</tr>
				@endforelse
				
			</tbody>
		</table>	
		<hr class="mb-5">
		@endif
		
	@empty

	@endforelse

	<!-- Modal -->
	<div class="modal fade" id="updateInventoryToolStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title text-center" id="exampleModalCenterTitle"><span id="inventorytool_name"> </span></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body text-center">
	        Change status of <span id="inventorytools_update"></span> from <span id="inventorytools_update_from"></span> to
	      </div>
	      <div class="modal-footer">
	      <!-- USE JS TRAVERSING TO REFLECT tool details being updated -->
	      	<form method="POST" id="howmygash" action="">
                        @csrf
                        @method('PATCH')
	      		<span style="display: inline-block;">
		      		<select id="inventorytools_update_to" type="text" class="form-control" name="inventorytools_update_to" required autofocus>
		      			<option value="functioning">Functioning</option>     	
		      			<option value="needs repair">Needs Repair</option>
		      			<option value="on repair">On Repair</option>         	
		      			<option value="discarded">Discarded</option>
	 		        </select>
 		        </span>
	      		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	       	 	<button type="submit" class="btn btn-primary">Save changes</button>
	      	</form>
	      </div>
	    </div>
	  </div>
	</div>



	
@endsection