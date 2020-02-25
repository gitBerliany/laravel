@extends('layout/main')

@section('title', 'Add New Movie')

@section('container')
<div class="container">
	<div class = "row">
		<div class="col-2"></div>
		<div class="col-8" style="background-color: white;">
			<h3 class="mt-3" align="center">Add New Movie</h3>			
			<form method="post" action="/" enctype="multipart/form-data" class="add">
			@csrf
				<div class="form-group">
					<label for="title">Movie Title</label>
					<input type="text" class="form-control @error('title') is-invalid @enderror" id="movie_title" aria-describedby="Title" placeholder="Input movie title" name="title">
					@error('title') <div class="invalid-feedback">{{$message}}</div> @enderror
				</div>

				<div class="form-group">
					<label for="year">Release Year</label>
					<input type="text" class="form-control @error('year') is-invalid @enderror" id="year" aria-describedby="year" placeholder="Input Release Year" name="year">
					@error('year') <div class="invalid-feedback">{{$message}}</div>@enderror
				</div>
				<div class="form-group">
					<label for="rate">Movie Rate</label>
					<select class="custom-select" class="form-control @error('rate') is-invalid @enderror" name="rate" id="rate">
						<option value="NR">Not Rated</option>
						<option value="G">General (G)</option>
						<option value="PG">Parental Guidance Suggested (PG)</option>
						<option value="PG-13">Parents Strongly Cautioned (PG-13)</option>
						<option value="R">Restricted (R)</option>
						<option value="NC-17">Adult Only (NC-17)</option>
					</select>
					@error('rate') <div class="invalid-feedback">{{$message}}</div>@enderror
				</div>
				<div class="form-group">
					<label for="time">Time (in minutes)</label>
					<input type="number" class="form-control @error('time') is-invalid @enderror" id="time" aria-describedby="time" placeholder="Input Movie Time" name="time">
					@error('time') <div class="invalid-feedback">{{$message}}</div>@enderror
				</div>
				<div class="form-group">
					<label for="genre">Genre</label>
					<input type="text" class="form-control @error('genre') is-invalid @enderror" id="genre" aria-describedby="genre" placeholder="Input Movie Genre" name="genre">
					@error('genre') <div class="invalid-feedback">{{$message}}</div>@enderror
				</div>
				<div class="form-group">
					<label for="direct">Director</label>
					<input type="text" class="form-control @error('director') is-invalid @enderror" id="director" aria-describedby="direct" placeholder="Input Movie Director" name="director">
					@error('director') <div class="invalid-feedback">{{$message}}</div>@enderror
				</div>
				<div class="form-group">
					<label for="">Movie Poster</label>
					<input type="file" name="image" class="form-control">
					<p class="text-danger">{{ $errors->first('image') }}</p>
				</div>
				<div class="form-group">
					<label for="storyline">Storyline</label>
					<textarea id="storyline" class="form-control @error('storyline') is-invalid @enderror" name="storyline"></textarea>
					@error('storyline') <div class="invalid-feedback">{{$message}}</div>@enderror
				</div>
				<div align="center">
					<button type="submit" class="btn btn-primary">Add Movie</button>
				</div>

				<script>
					$(".add").on("submit", function(){
						return confirm("Are you sure?");
					});
				</script>
		</div>
	</div>
</div>
@endsection