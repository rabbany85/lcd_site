@extends('layouts.sidebar')

@section('mainContent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>Delete Account: {{ $profile->title }} {{ $profile->last_name }}</h1>
            <a href="{{ route('profile.single', ['profile' => $profile->id]) }}" class="btn btn-info btn-lg">Cancel</a>
            <h1>We are sorry to see you leave. We need your password to delete your account.</h1>               
			 <form method="POST" action="{{ route('profile.delete', ['profile' => $profile->id])}}">
			 	@csrf
			 	<label>Confirm Password</label>
                <input type="password" name="password">
                <br>
			 	<input class="btn btn-danger btn-lg" type="submit" value="Delete">
			 </form>
        </div>
    </div>
</div>
@endsection