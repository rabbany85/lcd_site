	@extends('layouts.userMaster')
	@section('sidebar')

	@Client
	<ul class="nav" id="side-menu">
	    <li><a href="{{ route('profile.single', ['profile' => Auth::user()->id]) }}"> 
	    	 <span class="nav-label">Profile</span> 
	        </a>
	    </li>
	    <li><a href="{{URL::to('categoryList')}}"> 
	    	 <span class="nav-label">Shop</span> 
	        </a>
	    </li>
	    <li><a href="{{ route('order.index') }}"> 
	    	 <span class="nav-label">My Orders</span> 
	        </a>
	    </li>
	</ul>
	@endClient

	@Admin
	<ul class="nav" id="side-menu">
	    <li><a href="{{ route('profile.single', ['profile' => Auth::user()->id]) }}">
	    	   <span class="nav-label">Profile</span>
	    	</a>
	    </li>
	    <li><a href="{{ route('client.index') }}">
	    	   <span class="nav-label">Client</span>
	    	</a>
	    </li>
	    <li><a href="{{ route('order.index') }}">
	    	   <span class="nav-label">Order</span>
	    	</a>
	    </li>
	    <li><a href="{{ route('product.index') }}">
	    	   <span class="nav-label">Product</span>
	    	</a>
	    </li>
	    <li><a href="{{ route('category.index') }}">
	    	   <span class="nav-label">Category</span>
	    	</a>
	    </li>
	    <li><a href="{{ route('delivery_charge.index')}}">
	    	   <span class="nav-label">Delivery Charge</span>
	    	</a>
	    </li>	    
	</ul>

	@endAdmin

	@Manager
	<ul class="nav" id="side-menu">
	    <li><a href="{{ route('profile.single', ['profile' => Auth::user()->id]) }}">
	    	   <span class="nav-label">Profile</span>
	    	</a>
	    </li>
	    <li><a href="{{ route('admin.index') }}">
	    	   <span class="nav-label">Admin</span>
	    	</a>
	    </li>
	    <li><a href="{{ route('client.index') }}">
	    	   <span class="nav-label">Client</span>
	    	</a>
	    </li>
	    <li><a href="{{ route('order.index') }}">
	    	   <span class="nav-label">Order</span>
	    	</a>
	    </li>
	    <li><a href="{{ route('product.index') }}">
	    	   <span class="nav-label">Product</span>
	    	</a>
	    </li>
	    <li><a href="{{ route('category.index') }}">
	    	   <span class="nav-label">Category</span>
	    	</a>
	    </li>
	    <li><a href="{{ route('delivery_charge.index')}}">
	    	   <span class="nav-label">Delivery Charge</span>
	    	</a>
	    </li>
	</ul>
	@endManager

	@SuperAdmin
	<ul class="nav" id="side-menu">
	    <li><a href="{{ route('profile.single', ['profile' => Auth::user()->id]) }}">
	    	   <span class="nav-label">Profile</span>
	    	</a>
	    </li>
	    <li><a href="{{ route('manager.index') }}">
	    	   <span class="nav-label">Manager</span>
	    	</a>
	    </li>
	    <li><a href="{{ route('admin.index') }}">
	    	   <span class="nav-label">Admin</span>
	    	</a>
	    </li>
	    <li><a href="{{ route('client.index') }}">
	    	   <span class="nav-label">Client</span>
	    	</a>
	    </li>
	    <li><a href="{{ route('order.index') }}">
	    	   <span class="nav-label">Order</span>
	    	</a>
	    </li>
	    <li><a href="{{ route('product.index') }}">
	    	   <span class="nav-label">Product</span>
	    	</a>
	    </li>
	    <li><a href="{{ route('category.index') }}">
	    	   <span class="nav-label">Category</span>
	    	</a>
	    </li>
	    <li><a href="{{ route('delivery_charge.index')}}">
	    	   <span class="nav-label">Delivery Charge</span>
	    	</a>
	    </li>
	</ul>
	@endSuperAdmin

	@endsection