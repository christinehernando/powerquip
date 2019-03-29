@extends('layouts.app')

@section('title')
    Add To Tools Registry
@endsection

@section('content')
  {{-- 
    1. Add a Form to Add Categories. Include Form Validations
      - Input for Category Name (required)
      - Input for Description
      - Button to Add a Category
  --}}

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Add Tool To Registry</div>
        
        <div class="card-body">
          <form method="POST" action="{{ route('categories.show') }}">
            @csrf

            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="category_name" type="text" class="form-control{{ $errors->has('category_name') ? ' is-invalid' : '' }}" name="category_name" value="{{ old('category_name') }}" required autofocus>

                                @if ($errors->has('category_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="category_description" type="text" class="form-control{{ $errors->has('category_description') ? ' is-invalid' : '' }}" name="category_description" value="{{ old('category_description') }}" required autofocus>

                                @if ($errors->has('category_description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Category') }}
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