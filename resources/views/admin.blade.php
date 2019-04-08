@extends('layouts.app')

@section('title')
   List of Borrowed Books
@endsection

@section('content')
    <div class="container">
    	<div>
	    	<h4 class="mt-4 text-center">Transaction List</h4>
	    	<table class="table table-bordered table-striped m-50">
	    		<thead>
	    			<tr>
	    				<th>No</th>
	    				<th>Transaction Code</th>
	    				<th>Member</th>
	    				<th>Status</th>
	    				<th></th>
	    			</tr>
	    		</thead>
	    		<tbody>
	    			@forelse($borrows as $index => $borrow)

	    				<tr>
	    					<td>  {{ ++$index }} </td>
	    					<td>  {{ $borrow->transaction_code }} </td>
	    					<td>  {{ $borrow->user_id }} - {{ $borrow->user->first_name }} {{ $borrow->user->last_name }}  </td>
	    					<td> {{ $borrow->status }} </td>
	    					<td>   </td> 
	    				</tr>
	    				<tr>
	    					<td colspan="5" class="text-center"> Details</td>
	    					
	    				</tr>
	    				<tr>
	    					<td colspan="5">
		    					
		    						@forelse($borrow->inventory_tools as $tool)
		    						<tr>
		    							<td> {{ $tool->inventorytools->tool_serial}} </td>
		    							<td> {{ $tool->inventorytools->registrytool->asset_name}} </td>
		    							<td> {{ $tool->status}} </td>
		    							{{ $tool->status }},
		    						</tr>
		    						@empty
		    							None
		    						@endforelse
		    					
	    					</td>
	    				</tr>
	    				<tr>
	    					
	    				</tr>
	    			@empty
	    			
	    			@endforelse
	    			
	    		</tbody>
	    		
	    	</table>
	    	<a href="/borrows" method="GET">
	    		<button class="btn btn-success">Submit Request</button>
	    	</a>	
	    </div>
    </div>
@endsection