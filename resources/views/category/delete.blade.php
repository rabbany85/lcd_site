@extends('layouts.sidebar')

@section('mainContent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>Delete Category: {{ $category->title }} will delete all the products from the database that are belongs to it.</h1>
            <a href="{{ route('category.index') }}" class="btn btn-info btn-lg">Cancel</a>               
			 <form method="POST" action="{{ route('category.delete', ['category' => $category->id])}}">
			 	@csrf
			 	<input type="hidden" name="id" value="{{$category->id}}">
			 	<input class="btn btn-danger btn-lg" type="submit" value="Delete">
			 </form>
        </div>
    </div>
</div>
@endsection