@extends('layouts.app')

@section('title')
    Library
@endsection

@section('content')
  {{--
    1. Add a Form with an input field called Search
    2. Show all the Books available in a form of a Card(Bootstrap Component)
      @for each books
        - Show the image
        - Show the Book Name
        - Display Book Availability
        - Show Action Buttons 
          - Details
          - Borrow
          - Return
    Notes:
      - Show a message that No Books were found if there are no books available or The Search query does not match any of the books available
  --}}
@endsection
