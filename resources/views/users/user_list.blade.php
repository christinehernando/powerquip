@extends('layouts.app')

@section('title')
    User List
@endsection

@section('content')
<div class="container"> 
  <h1 class="text-center">User List</h1>
  <a href="{{ route('register') }}" class="btn btn-primary float-right">
    Add New User
  </a>
  <table class="table table-striped table-bordered mt-5">
    <thead>
      <tr class="text-center">
        <th>No</th>
        <th>First Name</th>
        <th>Middle Initial</th>
        <th>Last Name</th>
        <th>Username</th>
        <th>Birthday</th>
        <th>Type</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse($users as $index => $user)
        <tr>
          <td class="text-center">{{ ++$index }}</td>
          <td class=""> {{ ucfirst($user->first_name) }} </td>
          <td class=""> {{ ucfirst($user->middle_initial) }} </td>
          <td class=""> {{ ucfirst($user->last_name) }} </td>
          <td class=""> {{ $user->username }} </td>
          <td class=""> {{ $user->birthday }} </td>
          <td class=""> {{ ucfirst($user->type) }} </td>
          <td class=""> 
            @if($user->status == 0)
              <span class="text-secondary"> Not Active </span>
            @else
              <span class="text-success"> Active </span>
            @endif 
          </td>
          <td class="text-center"> 
            @if ($user->status == 0)
                <form action="/users/{{ $user->id }}/approve" method="POST" style="display: inline-block;">
                  @csrf
                  @method('PATCH')
                  <input type="text" name="status" hidden value="{{$user->id}}">
                  <button class="btn btn-success">Activate</i></button>
                </form>
            @else
                <a href="/users/{{ $user->id }}/edit" >
                  <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                </a>
                <form action="/users/{{ $user->id }}" method="POST" style="display: inline-block;">
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
            <td colspan="8"> Oh no users in the database! Hala you deleted everything!</td>
          </tr>
      @endforelse
    </tbody>
  </table>
</div>

@endsection






{{-- 
  1. Add a button for adding New User
  2. Create a table with the following table headers:
    - #
    - Name
    - Email
    - Type
    - Status
    - Actions
  3. For each row:
    @if the user's status == 0
      - Show the button for Approval
    @else
      - Show the buttons for Editing and Deleting a User
--}}
