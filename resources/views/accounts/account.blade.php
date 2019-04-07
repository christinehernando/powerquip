@extends('layouts.app')

@section('title')
   List of Borrowed Books
@endsection

@section('content')
    <div class="container">
	    <div>
	    	<h4 class="mt-4">Cart List</h4>
	    	<table class="table table-bordered table-striped text-center m-50">
	    		<thead>
	    			<tr>No</tr>
	    			<tr>Name</tr>
	    			<tr>Serial</tr>
	    			<tr>Category</tr>
	    			<tr></tr>
	    		</thead>
	    		<tbody>
	    			@foreach($cart as $item)
	    		</tbody>
	    		
	    	</table>	
	    </div>
                
    </div>
@endsection