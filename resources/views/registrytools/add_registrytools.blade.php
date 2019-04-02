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
          <form method="POST" action="{{ route('registrytool.store') }}" enctype="multipart/form-data">
            @csrf


            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

              <div class="col-md-6">
                  <input id="registrytool_name" type="text" class="form-control{{ $errors->has('registrytool_name') ? ' is-invalid' : '' }}" name="registrytool_name" value="{{ old('registrytool_name') }}" required autofocus>

                  @if ($errors->has('registrytool_name'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('registrytool_name') }}</strong>
                      </span>
                  @endif
              </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                <div class="col-md-6">
                    <input id="registrytool_description" type="text" class="form-control{{ $errors->has('registrytool_description') ? ' is-invalid' : '' }}" name="registrytool_description" value="{{ old('registrytool_description') }}" required autofocus>

                    @if ($errors->has('registrytool_description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('registrytool_description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                <div class="col-md-6">
                    <select id="registrytool_category" type="text" class="form-control{{ $errors->has('registrytool_category') ? ' is-invalid' : '' }}" name="registrytool_category" value="{{ old('registrytool_category') }}" required autofocus>
                        <option></option>
                        @foreach ($categories as $key => $category)
                          <option  value="{{ $category->id }}"> {{ $category->name }} </option>
                        @endforeach
                    </select>
                     
                    @if ($errors->has('registrytool_category'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('registrytool_category') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="Image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                <div class="col-md-6">
                    <input id="registrytool_image" type="file" class="form-control{{ $errors->has('registrytool_image') ? ' is-invalid' : '' }}" name="registrytool_image" value="{{ old('registrytool_image') }}" required autofocus>

                    @if ($errors->has('registrytool_image'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('registrytool_image') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Add Tool To Registry') }}
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