@extends('layouts.app')

@section('title')
   List of Borrowed Books
@endsection

@section('content')
	<div class="container mt-4">
		<!-- CART REQUEST -->
    	<button class="btn btn-info btn-block mt-4 mb-3 " type="button" data-toggle="collapse" data-target="#collapseCart" aria-expanded="false" aria-controls="collapseExample">
    		Cart Items For Request
  		</button>
  		<div class="collapse mt-4 mb-5" id="collapseCart">
  			<div class="card card-body">
  				@empty($cart)
					No items in cart
				@else
					<div>
				    	<h4 class="mt-4 text-center">Cart List</h4>
				    	<table class="table table-bordered table-striped m-50">
				    		<thead>
				    			<tr>
				    				<th>No</th>
				    				<th>Name</th>
				    				<th>Serial</th>
				    				<th>Category</th>
				    				<th></th>
				    			</tr>
				    		</thead>
				    		<tbody>

				    			@forelse($cart as $index => $item)
				    				<tr>
				    					<td> {{ ++$counter }} </td>
				    					<td> {{ $item['name']  }} </td>
				    					<td>  {{ $item['serial']}} </td>
				    					<td>  {{ $item['category']}} </td>
				    					<td>
				    						<button class="btn btn-primary">
				    							<i class="fas fa-plus"></i>
				    						</button>
				    						<button class="btn btn-danger">
				    							<i class="fas fa-trash"></i>
				    						</button>
				    					</td>
				    				</tr>
				    			@empty
				    				<tr>
										<td colspan="5" class="text-center"> No tools to show.</td>
									</tr>



				    			@endforelse
				    		</tbody>
				    		
				    	</table>
				    	<a href="/borrows/account" method="GET">
				    		<button class="btn btn-success btn-block">Submit Request</button>
				    	</a>	
				    </div>
				@endempty
  			</div>
  		</div>

  		<!-- APPROVE REQUEST -->
    	<button class="btn btn-info btn-block mt-4 mb-3" type="button" data-toggle="collapse" data-target="#collapseApproveRequestUser" aria-expanded="false" aria-controls="collapseExample">
    		Tool Request For Approval 
    		
  		</button>
  		<div class="collapse mt-4 mb-5" id="collapseApproveRequestUser">
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
		    	</div>
	    	@empty
	    		<span class="text-center"> No requests to approve. </span>
	    	@endforelse    		
		  </div>
		</div>

		<!-- DELIVERED -->
    	<button class="btn btn-info btn-block mt-4" type="button" data-toggle="collapse" data-target="#collapseDeliverUser" aria-expanded="false" aria-controls="collapseExample">
    		Approved Tool Requests For Pick Up
  		</button>
  		<div class="collapse mt-4" id="collapseDeliverUser">
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
  						<div class="card-footer">
	  						<a href="account/{{$borrow->id}}" class="btn btn-success btn-block">
					    		Picked up in good order.
					    	</a>
  						</div>
  						
  					</div>
  				@empty
  					<span class="text-center"> No approved requests or items on loan. </span>
  				@endforelse
  				
  			</div>
  			
  		</div>

  		<!-- BORROWED TOOLS -->
    	<button class="btn btn-info btn-block mt-4 mb-3" type="button" data-toggle="collapse" data-target="#collapseBorrowedUser" aria-expanded="false" aria-controls="collapseExample">
    		Borrowed Tools 
    		
  		</button>
  		<div class="collapse mt-4 mb-5" id="collapseBorrowedUser">
		  <div class="card card-body">
		    @forelse($forReturn as $index =>$borrow)
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
	    		<span class="text-center"> No items to show. </span>
	    	@endforelse    		
		  </div>
		</div>

		<!-- PAST TRANSACTIONS -->
    	<button class="btn btn-info btn-block mt-4 mb-3" type="button" data-toggle="collapse" data-target="#collapseBorrowedUser" aria-expanded="false" aria-controls="collapseExample">
    		Past Transactions
    		
  		</button>
  		<div class="collapse mt-4 mb-5" id="collapseBorrowedUser">
		  <div class="card card-body">
		    @forelse($return as $index =>$borrow)
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
	    		<span class="text-center"> No items to show. </span>
	    	@endforelse    		
		  </div>
		</div>


			
		

		

	

    </div>
@endsection