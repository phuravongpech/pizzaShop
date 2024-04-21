{{-- @extends('cart.layout')
     
@section('content')
      
<div class="row">
    @foreach($foods as $food)
        <div class="col-xs-18 col-sm-6 col-md-4" style="margin-top:10px;">
            <div class="img_thumbnail productlist">
                <img src="{{ asset('img') }}/{{ $food->photo }}" class="img-fluid">
                <div class="caption">
                    <h4>{{ $food->food_name }}</h4>
                    <p>{{ $food->desc }}</p>
                    <p><strong>Price: </strong> ${{ $food->price }}</p>
                    <p class="btn-holder"><a href="{{ route('add_to_cart', $food->id) }}" class="btn btn-primary btn-block text-center" role="button">Add to cart</a> </p>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
       --}}