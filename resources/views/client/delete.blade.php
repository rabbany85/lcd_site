@extends('layouts.sidebar')

@section('mainContent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>Delete Client: {{ $client->title }} {{ $client->last_name }}</h1>
            <a href="{{ route('client.index') }}" class="btn btn-info btn-lg">Cancel</a>               
			 <form method="POST" action="{{ route('client.delete', ['client' => $client->id])}}">
			 	@csrf
			 	<input type="hidden" name="id" value="{{$client->id}}">
			 	<input class="btn btn-danger btn-lg" type="submit" value="Delete">
			 </form>
        </div>
    </div>
</div>
@endsection