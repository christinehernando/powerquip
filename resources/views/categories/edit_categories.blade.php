@extends('layouts.app')

@section('title')
    Edit Category Details
@endsection

@section('content')
  {{--  
    1. Add a Form to Edit a Category. Include Form Validations.
      **Tips: 
        - When dealing with forms, always add @csrf
        - In this form, add @method('PATCH')
      - Input for Category Name
      - Input for Description
      - Button to Update Category Details
  --}}



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Category Update Information </div>

                <div class="card-body">
                    <form method="POST" action="/categories/{{ $category->id }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="edit_category_name" type="text" class="form-control{{ $errors->has('category_name') ? ' is-invalid' : '' }}" name="category_name" value="{{ $category->name }}" required autofocus>

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
                                <input id="edit_category_description" type="text" class="form-control{{ $errors->has('category_description') ? ' is-invalid' : '' }}" name="category_description" value="{{ $category->description }}" autofocus>

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
                                    {{ __('Edit Category') }}
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