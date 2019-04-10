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

        <div class="container justify-content-center">
            <div class="row mt-5 justify-content-center">
                
                    @foreach($returns as $return)
                        @php
                            $image = $return["image"];
                        @endphp
                    <div class="card mb-5 mt-5 mr-2" style="width: 18rem; height: auto">
                        <div class="justify-content-center">
                           <img src='{{ asset("images/tools/{$image}")}}' class="card-img-top py-2 m-auto" style="width: 270px; height: 270px; align-content: center;"> 
                        </div> 
                        <div class="card-body">
                            <h5 class="card-title"> {{ $return["name"] }} </h5>
                            <p class="card-text"> {{ $return["description"]}} </p>
                        </div>
                        <div class="card-footer">
                            <p class="card-text">Available 
                                @if($return["available"] >1)
                                    units : {{ $return["available"] }}
                                @else
                                    unit : {{ $return["available"] }}
                                @endif
                            </p>
                            <p class="card-text">Total 
                                @if($return["total"] >1)
                                    units : {{ $return["total"] }}
                                @else
                                    unit : {{ $return["total"] }}
                                @endif
                            </p>
                        </div>
                        @if(Auth::user()->type == "admin")
                        @else 
                            <div class="justify-content-center">
                                <form action="/cart/{{ $return['id']}}"   method="POST">
                                @csrf
                               <!--  <input type="number" name="quantity" value="1"> -->
                                <button class="card-text btn btn-primary text-center btn-block"> Add to cart </button>
                            </form>    
                            </div>
                                                   
                        @endif
                    </div>
                    @endforeach
                
            </div>
        </div>      
    </div>
	
@endsection
