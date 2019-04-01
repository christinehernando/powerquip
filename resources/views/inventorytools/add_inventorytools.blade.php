@extends('layouts.app')

@section('title')
	Add New Tool Inventory
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Add New Tool Inventory</div>

				<div class="card=body">
					<form method="POST" action="{{route('inventorytools.store')}}">
					@csrf
					<div class="form-group row">
		              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Add To') }}</label>

		              <div class="col-md-6">
		                  <select id="add_inventorytool_registry_tool_id" type="text" class="form-control{{ $errors->has('add_inventorytool_registry_tool_ide') ? ' is-invalid' : '' }}" name="add_inventorytool_registry_tool_id" required autofocus>

		                  <option value=" {{$id}} " selected="">  {{ $tool_name->asset_name }}   </option>
                          @foreach ($registryTools as $key => $registryTool)
                          {{ $registryTools}}
                          	<option  value="{{ $registryTool->id }}"> {{ $registryTool->asset_name }} </option>
                          @endforeach                               	

		                  </select>

		                  @if ($errors->has('add_inventorytool_registry_tool_id'))
		                      <span class="invalid-feedback" role="alert">
		                          <strong>{{ $errors->first('add_inventorytool_registry_tool_id') }}</strong>
		                      </span>
		                  @endif
		              </div>
		            </div>



					<div class="form-group row">
		              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tool Serial') }}</label>

		              <div class="col-md-6">
		                  <input id="add_inventorytool_name" type="text" class="form-control{{ $errors->has('add_inventorytool_name') ? ' is-invalid' : '' }}" name="add_inventorytool_name" value="{{ $tool_serial }}" required autofocus>

		                  @if ($errors->has('add_inventorytool_name'))
		                      <span class="invalid-feedback" role="alert">
		                          <strong>{{ $errors->first('add_inventorytool_name') }}</strong>
		                      </span>
		                  @endif
		              </div>
		            </div>



		             <div class="form-group row mb-0">
		                <div class="col-md-6 offset-md-4">
		                    <button type="submit" class="btn btn-primary">
		                        {{ __('Add Tool To Inventory') }}
		                    </button>
		                </div>
		            </div>



					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection