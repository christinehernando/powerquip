@extends('layouts.app')

@section('title')
    Home
@endsection

{--
    At a minimum, this view should have a search bar to find particular titles and a "Browse" button that will bring the user to the catalogue of books on offer. 
    --}

EDIT TEMPorarY
@section('content')
	<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    PowerQuip
                </div>

            </div>
        </div>
@endsection
