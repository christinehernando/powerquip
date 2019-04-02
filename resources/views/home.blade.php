@extends('layouts.app')

@section('title')
    Home
@endsection

<!-- {--
    At a minimum, this view should have a search bar to find particular titles and a "Browse" button that will bring the user to the catalogue of books on offer. 
    --} -->


@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-md-8">
                <form action="/home" method="GET"  >
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
        <div class="row justify-content-center">
            <div class="col-md-10 justify-content-center"> 
                @foreach($tools as $inventory)
                      {{ $inventory }}
                      <hr>                      

                @endforeach

                @if(!count($result) == 0)
                    <div class="card-deck">
                        <div>
                            @foreach( $result as $tool)
                                <div class="card">
                                <img class="card-img-top" src='{{ asset("images/{$tool->image_path}") }}' alt="Card image cap">
                                <div class="card-body">
                                  <h5 class="card-title">{{ $tool->asset_name }}</h5>
                                  <p class="card-text">{{ $tool->description }}</p>
                                </div>
                                <div class="card-footer">
                                  <small class="text-muted">Last updated 3 mins ago</small>
                                  
                                   


                                </div>
                              </div>
                            @endforeach
                        </div>                     
                    </div>
                @else
                    no result. provide browse button
                @endif
                
<!-- SHOW WHEN BROWSE BUTTON IS CLICKED  -->
              
<!-- SHOW WHEN BROWSE BUTTON IS CLICKED  -->
            </div>
        </div>
    </div>
	
@endsection
