@extends('layout/main')

@section('title', 'Detail Movie')

@section('container')
<div class="container">
	<div class = "row">
		<div class="col-10">
			<h2 class="mt-3" align="center">Movie Detail</h2>
			<div class="card mb-3 mt-4" >
				<div class="row no-gutters">
					<div class="col-md-4">
						<img src="{{ asset('/images/'. $movie->mov_img) }}" style="text-align:center" style="width:250px;height:350px;padding: 5px" class="card-img" alt="...">
						<form action="{{$movie->id}}/img" method="post" class="edit d-inline" enctype="multipart/form-data">
							@method('put')
							@csrf
							<div class="form-group" align="center">
								<input type="file" name="image" class="form-control">
								<p class="text-danger">{{ $errors->first('image') }}</p>
								<button type="submit" class="btn btn-primary">Change Image</a>
								<script>
										    $(".edit").on("submit", function(){
										        return confirm("Are you sure you want to change the image?");
										    });
										</script>
								</div>
							</form>
						</div>

						<div class="col-md-8">
							<div class="card-body">
								<h4 class="card-title">{{$movie->mov_title}} ( {{$movie->mov_year}} )</h4>
								<h6 class="card-subtitle mb-2 text-muted"> {{$movie->mov_rate}} | {{$movie->mov_time}} mins | Drama</h6>
								<h6 class="card-subtitle mb-2">Director : {{$movie->mov_direct}}</h6>
								<p class="card-text">{{$movie->mov_story}}</p>
								<div align="right" class="mt-5" >
									<a href="{{$movie->id}}/edit" class="btn btn-primary btn-lg">Edit</a>
									<form action= "{{ $movie->id }}" method="post" class="delete d-inline">
										@method('delete')
										@csrf
										<button type="submit" class="btn btn-danger btn-lg">Delete</button>
										<script>
										    $(".delete").on("submit", function(){
										        return confirm("Are you sure?");
										    });
										</script>
									</script>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection