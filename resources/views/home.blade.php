@extends('layouts.app')

@section('title')
    Home
@endsection

<!-- {
    At a minimum, this view should have a search bar to find particular titles and a "Browse" button that will bring the user to the catalogue of books on offer. 
    } -->


@section('content')
    <div class="container mb-5">
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-md-8">
                <form action="/home" method="GET"  class="mt-5">
                    @csrf
                    <div class="input-group justify-content-center">
                        <input type="text" class="form-control ml-3" name="search" value="Search tools" id="search-value"> 
                        <button type="submit" class="btn btn-success ml-2" id="search-button">
                            <i class="fas fa-search"></i>
                        </button>
                        <a href="" class="btn btn-success ml-3">
                            Browse Tools
                        </a>    
                    </div>
                </form>
            </div>
        </div>

        <div class="container">
            <div class="row mt-5">
                <div class="card-deck mt-5">
                    @foreach($returns as $return)
                    <div class="card">
                        <img src="">
                        <div class="card-body">
                            <h5 class="card-title"> {{ $return["name"] }} </h5>
                            <p class="card-text"> {{ $return["description"]}} </p>
                        </div>
                        <div class="card-footer">
                            <p class="card-text">Available : {{ $return["available"] }} </p>
                            <p class="card-text">Total : {{ $return["total"] }} </p>
                        </div> 
                        <form action="/cart/{{ $return['id']}}" method="POST">
                            @csrf
                           <!--  <input type="number" name="quantity" value="1"> -->
                            <button class="card-text btn btn-primary btn-block mt-2"> <i class="fas fa-cart-plus"></i> </button>
                        </form>                       

                    </div>
                    @endforeach
                </div>
            </div>
        </div>      
    </div>
	
@endsection
