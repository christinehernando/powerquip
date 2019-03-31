@extends('layouts.app')

@section('title')
    Tools Registry
@endsection


@section('content')
<div class="container"> 
  <h1 class="text-center">Tools Registry</h1>
  <a href="{{ route('registrytool.create') }}" class="btn btn-primary float-right">
    Add Tool
  </a>
  <table class="table table-striped table-bordered mt-5">
    <thead>
      <tr class="text-center">
        <th>No</th>
        <th>Name</th>
        <th>Description</th>
        <th>Category</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse($tools as $index => $registrytool)
        <tr>
          <td class="text-center">{{ ++$index }}</td>
          <td class=""> {{ ucfirst($registrytool->asset_name) }} </td>
          <td class=""> {{ ucfirst($registrytool->description) }} </td>
          <td class=""> {{ ucfirst($registrytool->category->name) }} </td>
          <td class=""> 
            @if($registrytool->status == 0)
              <span class="text-secondary"> Not In Use </span>
            @else
              <span class="text-success"> In Use </span>
            @endif 
          </td>
          <td class="text-center"> 
            @if ($registrytool->status == 0)
                <form action="/registrytool/{{ $registrytool->id }}/activate"  method="POST" style="display: inline-block;">
                  @csrf
                  @method('PATCH')
                  <input type="text" name="status" hidden value="{{$registrytool->id}}">
                  <button class="btn btn-success">Activate</i></button>
                </form>
            @else
                <a href="/registrytool/{{ $registrytool->id }}/edit" >
                  <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                </a>
                <form action="/registrytool/{{ $registrytool->id }}" method="POST" style="display: inline-block;">
                  @csrf
                  @method('DELETE')
                  <input type="text" name="status" hidden value="1">
                  <button class="btn btn-danger"><i class="fas fa-ban"></i></button>
                </form>
            @endif

          </td>

        </tr>
      @empty
        <tr>
            <td colspan="6" class="text-center"> Oh no tools in the database! Hala you deleted everything!</td>
          </tr>
      @endforelse
    </tbody>
  </table>
</div>

@endsection
