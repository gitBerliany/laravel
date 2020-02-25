@extends('layout/main')

@section('title', 'Home Movies')

@section('container')
<div class="container">
	<div class = "row">
		<div class="col-10">
			<h1 class="mt-3" style="text-align: center">Movie List</h1>
			<div align="right" class="m-3 px-2">
				<a href="/create" class="btn btn-primary" style="text-align: right;">Add New Movie</a>
			</div>
			@if (session('status'))
			<div class="alert alert-success">
				{{ session('status')}}
			</div>
			@endif

		
			<div class="container">
				<div class="row">
					@foreach( $movies as $mov)
					<div class="col-4 mt-2">
						<div class="card" style="width: 18rem;">
						  <img src="{{ asset('/images/'. $mov->mov_img) }}" style="text-align:center" style="width:250px;height:300px;" class="card-img-top" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title">{{$mov->mov_title}}</h5>
						    <p class="card-text">{{ \Illuminate\Support\Str::limit($mov->mov_story, 110, $end='...') }}</p>
						    <a href="{{$mov->id}}" class="btn btn-primary">View More ...</a>
						  </div>
						</div>
						
					</div>
					@endforeach
				</div>

			</div>

		</div>
	</div>
</div>

@endsection