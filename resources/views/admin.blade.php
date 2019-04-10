@extends('layouts.app')

@section('title')
   List of Borrowed Books
@endsection

@section('content')
    <div class="container mt-4">
    	<!-- APPROVE REQUEST -->
    	<button class="btn btn-info btn-block" type="button" data-toggle="collapse" data-target="#collapseApproveRequest" aria-expanded="false" aria-controls="collapseExample">
    		Borrow Request For Approval
  		</button>
  		<div class="collapse mt-4" id="collapseApproveRequest">
		  <div class="card card-body">
		    @forelse($forApproval as $index =>$borrow)
		    	<div class="card mb-5">
		    		<div class="card-header">
		    			<div class="form-group row">
		    				<label class="col-sm-4 col-form-label">No</label>
		    				<div class="col-sm-8"> {{ ++$index }}</div>
		    			</div>
		    			<div class="form-group row">
		    				<label class="col-sm-4 col-form-label">Transaction Code</label>
		    				<div class="col-sm-8">{{ $borrow->transaction_code }}</div>
		    			</div>
		    			<div class="form-group row">
		    				<label class="col-sm-4 col-form-label">Member</label>
		    				<div class="col-sm-8">{{ $borrow->user_id }} - {{ ucfirst($borrow->user->first_name) }} {{ ucfirst($borrow->user->last_name) }}</div>
		    			</div>
		    			<div class="form-group row">
		    				<label class="col-sm-4 col-form-label">Current Status</label>
		    				<div class="col-sm-8">{{ ucfirst($borrow->status) }}</div>
		    			</div>
		    		</div>
		    		<div class="card-body">
		    			<table class="table table-striped table-bordered">
							<thead>
								<tr class="text-center">
									<th>No</th>
									<th>Serial</th>
									<th>Tool Name</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								@forelse($borrow->inventory_tools as $index => $tool)
	    						<tr>
	    							<td> {{ ++$index }} </td>
	    							<td> {{ $tool->inventorytools->tool_serial}} </td>
	    							<td> {{ $tool->inventorytools->registrytool->asset_name}} </td>
	    							<td> {{ ucfirst($tool->status)}} </td>
	    						</tr>
	    						@empty
	    							None
	    						@endforelse			
							</tbody>			
						</table>
		    		</div>
		    		<div class="card-footer">
		    			
    						<a href="/admin/{{ $borrow->id }}/approve">
    							<button class="btn btn-success btn-block">Approve</button>
    						</a>
    					
		    		</div>
		    	</div>
	    	@empty
	    		<span class="text-center"> No requests to approve. </span>
	    	@endforelse    		
		  </div>
		</div>
    	
    	<!-- DELIVERED -->
    	<button class="btn btn-info btn-block mt-4" type="button" data-toggle="collapse" data-target="#collapseDelivery" aria-expanded="false" aria-controls="collapseExample">
    		For Member Pick Up
  		</button>
  		<div class="collapse mt-4" id="collapseDelivery">
  			<div class="card card-body">
  				@forelse($forDelivery as $index => $borrow)
  					<div class="card mb-5">
  						<div class="card-header">
  							<div class="form-group row">
			    				<label class="col-sm-4 col-form-label">No</label>
			    				<div class="col-sm-8"> {{ ++$index }}</div>
			    			</div>
			    			<div class="form-group row">
			    				<label class="col-sm-4 col-form-label">Transaction Code</label>
			    				<div class="col-sm-8">{{ $borrow->transaction_code }}</div>
			    			</div>
			    			<div class="form-group row">
			    				<label class="col-sm-4 col-form-label">Member</label>
			    				<div class="col-sm-8">{{ $borrow->user_id }} - {{ ucfirst($borrow->user->first_name) }} {{ ucfirst($borrow->user->last_name) }}</div>
			    			</div>
			    			<div class="form-group row">
			    				<label class="col-sm-4 col-form-label">Current Status</label>
			    				<div class="col-sm-8">{{ ucfirst($borrow->status) }}</div>
			    			</div>
  						</div>
  						<div class="card-body">
  							<table class="table table-striped table-bordered">
								<thead>
									<tr class="text-center">
										<th>No</th>
										<th>Serial</th>
										<th>Tool Name</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									@forelse($borrow->inventory_tools as $index => $tool)
		    						<tr>
		    							<td> {{ ++$index }} </td>
		    							<td> {{ $tool->inventorytools->tool_serial}} </td>
		    							<td> {{ $tool->inventorytools->registrytool->asset_name}} </td>
		    							<td> {{ ucfirst($tool->status)}} </td>
		    						</tr>
		    						@empty
		    							None
		    						@endforelse			
								</tbody>			
							</table>
  						</div> 						
  					</div>
  				@empty
  					<span class="text-center"> No items to display. </span>
  				@endforelse
  				
  			</div>
  			
  		</div>

  		<!-- RETURNED -->
    	<button class="btn btn-info btn-block mt-4" type="button" data-toggle="collapse" data-target="#collapseReturned" aria-expanded="false" aria-controls="collapseExample">
    		On Loan From Users
  		</button>
  		<div class="collapse mt-4" id="collapseReturned">
  			<div class="card card-body">
  				@forelse($forReturn as $index => $borrow)
  					<div class="card mb-5">
  						<div class="card-header">
  							<div class="form-group row">
			    				<label class="col-sm-4 col-form-label">No</label>
			    				<div class="col-sm-8"> {{ ++$index }}</div>
			    			</div>
			    			<div class="form-group row">
			    				<label class="col-sm-4 col-form-label">Transaction Code</label>
			    				<div class="col-sm-8">{{ $borrow->transaction_code }}</div>
			    			</div>
			    			<div class="form-group row">
			    				<label class="col-sm-4 col-form-label">Member</label>
			    				<div class="col-sm-8">{{ $borrow->user_id }} - {{ ucfirst($borrow->user->first_name) }} {{ ucfirst($borrow->user->last_name) }}</div>
			    			</div>
			    			<div class="form-group row">
			    				<label class="col-sm-4 col-form-label">Current Status</label>
			    				<div class="col-sm-8">{{ ucfirst($borrow->status) }}</div>
			    			</div>
  						</div>
  						<div class="card-body">
  							<table class="table table-striped table-bordered">
								<thead>
									<tr class="text-center">
										<th>No</th>
										<th>Serial</th>
										<th>Tool Name</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									@forelse($borrow->inventory_tools as $index => $tool)
		    						<tr>
		    							<td> {{ ++$index }} </td>
		    							<td> {{ $tool->inventorytools->tool_serial}} </td>
		    							<td> {{ $tool->inventorytools->registrytool->asset_name}} </td>
		    							<td> {{ ucfirst($tool->status)}} </td>
		    						</tr>
		    						@empty
		    							None
		    						@endforelse			
								</tbody>			
							</table>
  						</div>
  						<div class="card-footer">
		    			
	    						<a href="/admin/{{ $borrow->id }}/return">
	    							<button class="btn btn-success btn-block">Returned</button>
	    						</a>
	    					
			    		</div> 						
  					</div>
  				@empty
  					<span class="text-center"> No items on loan. </span>
  				@endforelse
  				
  			</div>
  			
  		</div>

  		<!-- ACHIVE -->
    	<button class="btn btn-info btn-block mt-4" type="button" data-toggle="collapse" data-target="#collapseDone" aria-expanded="false" aria-controls="collapseExample">
    		Past Transactions
  		</button>
  		<div class="collapse mt-4" id="collapseDone">
  			<div class="card card-body">
  				@forelse($return as $index => $borrow)
  					<div class="card mb-5">
  						<div class="card-header">
  							<div class="form-group row">
			    				<label class="col-sm-4 col-form-label">No</label>
			    				<div class="col-sm-8"> {{ ++$index }}</div>
			    			</div>
			    			<div class="form-group row">
			    				<label class="col-sm-4 col-form-label">Transaction Code</label>
			    				<div class="col-sm-8">{{ $borrow->transaction_code }}</div>
			    			</div>
			    			<div class="form-group row">
			    				<label class="col-sm-4 col-form-label">Member</label>
			    				<div class="col-sm-8">{{ $borrow->user_id }} - {{ ucfirst($borrow->user->first_name) }} {{ ucfirst($borrow->user->last_name) }}</div>
			    			</div>
			    			<div class="form-group row">
			    				<label class="col-sm-4 col-form-label">Current Status</label>
			    				<div class="col-sm-8">{{ ucfirst($borrow->status) }}</div>
			    			</div>
  						</div>
  						<div class="card-body">
  							<table class="table table-striped table-bordered">
								<thead>
									<tr class="text-center">
										<th>No</th>
										<th>Serial</th>
										<th>Tool Name</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									@forelse($borrow->inventory_tools as $index => $tool)
		    						<tr>
		    							<td> {{ ++$index }} </td>
		    							<td> {{ $tool->inventorytools->tool_serial}} </td>
		    							<td> {{ $tool->inventorytools->registrytool->asset_name}} </td>
		    							<td> {{ ucfirst($tool->status)}} </td>
		    						</tr>
		    						@empty
		    							None
		    						@endforelse			
								</tbody>			
							</table>
  						</div> 						
  					</div>
  				@empty
  					<span class="text-center"> No items to display. </span>
  				@endforelse
  				
  			</div>
  			
  		</div>


    </div>
@endsection