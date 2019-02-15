@extends('layouts.sidebar')

@section('mainContent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>Delete Admin: {{ $admin->title }} {{ $admin->last_name }}</h1>
            <a href="{{ route('admin.index') }}" class="btn btn-info btn-lg">Cancel</a>               
			 <form method="POST" action="{{ route('admin.delete', ['admin' => $admin->id])}}">
			 	@csrf
			 	<input type="hidden" name="id" value="{{$admin->id}}">
			 	<input class="btn btn-danger btn-lg" type="submit" value="Delete">
			 </form>
        </div>
    </div>
</div>
@endsection