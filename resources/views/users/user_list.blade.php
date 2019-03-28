@extends('layouts.app')

@section('title')
    User List
@endsection

@section('content')
<div class="container"> 
  <h1 class="text-center">User List</h1>
  <a href="{{ route('register') }}" class="btn btn-success float-right">
    Add New User
  </a>
  <table class="table table-striped table-bordered mt-5">
    <thead>
      <tr class="text-center">
        <th>No</th>
        <th>First Name</th>
        <th>Middle Initial</th>
        <th>Last Name</th>
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
          <td class=""> {{$user->first_name}} </td>
          <td class=""> {{$user->middle_initial}} </td>
          <td class=""> {{$user->last_name}} </td>
          <td class=""> {{$user->birthday}} </td>
          <td class=""> {{$user->type}} </td>
          <td class=""> {{$user->status}} </td>
          <td class="text-center"> 
            @if ($user->status == 0)
                button to activate user
            @else
                <a href="{{ route('register') }}" class="btn btn-primary" style="display: inline-block;">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="/users/{{$user->id}}" method="POST" style="display: inline-block;">
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


testing horray! nakarating




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
