@extends('layouts.sidebar')

@section('mainContent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>Delete Product: {{ $product->title }}</h1>
            <a href="{{ route('product.index') }}" class="btn btn-info btn-lg">Cancel</a>               
			 <form method="POST" action="{{ route('product.delete', ['product' => $product->id])}}">
			 	@csrf
			 	<input type="hidden" name="id" value="{{$product->id}}">
			 	<input class="btn btn-danger btn-lg" type="submit" value="Delete">
			 </form>
        </div>
    </div>
</div>
@endsection