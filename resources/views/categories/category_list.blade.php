@extends('layouts.app')

@section('title')
    Category List
@endsection


@section('content')

<div class="container"> 
  <h1 class="text-center">Categories List</h1>
  <a href="{{ route('categories.create') }}" class="btn btn-primary float-right">
    Add Category
  </a>
  <table class="table table-striped table-bordered mt-5">
    <thead>
      <tr class="text-center">
        <th>No</th>
        <th>Name</th>
        <th>Description</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse($categories as $index => $category)
        <tr>
          <td class="text-center">{{ ++$index }}</td>
          <td class=""> {{ ucfirst($category->name) }} </td>
          <td class=""> {{ ucfirst($category->description) }} </td>
          <td class=""> 
            @if($category->status == 0)
              <span class="text-secondary"> Not In Use </span>
            @else
              <span class="text-success"> In Use </span>
            @endif 
          </td>
          <td class="text-center"> 
            @if ($category->status == 0)
                <form action="/categories/{{ $category->id }}/activate" method="POST" style="display: inline-block;">
                  @csrf
                  @method('PATCH')
                  <input type="text" name="status" hidden value="{{$category->id}}">
                  <button class="btn btn-success">Activate</i></button>
                </form>
            @else
                <a href="/categories/{{ $category->id }}/edit" >
                  <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                </a>
                <form action="/categories/{{ $category->id }}" method="POST" style="display: inline-block;">
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
            <td colspan="5" class="text-center"> Oh no categories in the database! Hala you deleted everything!</td>
          </tr>
      @endforelse
    </tbody>
  </table>
</div>

@endsection
