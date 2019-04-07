@extends('layouts.app')

@section('title')
   List of Borrowed Books
@endsection

@section('content')
    <div class="container">
	    <div>
	    	<h4 class="mt-4">Cart List</h4>
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
	    	<a href="/borrows" method="GET">
	    		<button class="btn btn-success">Submit Request</button>
	    	</a>	
	    </div>
                
    </div>
@endsection