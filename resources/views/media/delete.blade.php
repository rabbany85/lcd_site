@extends('layouts.sidebar')

@section('mainContent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>Delete Image: {{ $media->url }}</h1>
            <a href="{{ route('media.single', ['media' => $media->id]) }}" class="btn btn-info btn-lg">Cancel</a>               
			 <form method="POST" action="{{ route('media.delete', ['media' => $media->id])}}">
			 	@csrf
			 	<input type="hidden" name="id" value="{{$media->id}}">
			 	<input class="btn btn-danger btn-lg" type="submit" value="Delete">
			 </form>
        </div>
    </div>
</div>
@endsection