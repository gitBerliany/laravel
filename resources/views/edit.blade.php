@extends('layout/main')

@section('title', 'Detail Movie')

@section('container')
<div class="container">
	<div class = "row">
		<div class="col-10">
			<h3 class="mt-3" align="center">Change Movie Data</h3>			
			<form method="post" action="/{{$movie->id}}" enctype="multipart/form-data" class="edit">
				@csrf
				@method('put')	
				<div class="form-group">
					<label for="title">Movie Title</label>
					<input type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="Title" placeholder="Input movie title" name="title" value="{{$movie->mov_title}}">
					@error('title') <div class="invalid-feedback">{{$message}}</div>@enderror
				</div>
				<div class="form-group">
					<label for="year">Release Year</label>
					<input type="text" class="form-control @error('year') is-invalid @enderror" id="year" aria-describedby="year" placeholder="Input Release Year" name="year" value="{{$movie->mov_year}}">
					@error('year') <div class="invalid-feedback">{{$message}}</div>
					@enderror
				</div>
				<div class="form-group">
					<label for="rating">Movie Rate</label>
					<select class="custom-select" class="form-control" name="rate" id="rate">
						<option {{old('rate',$movie->mov_rate)=="NR"? 'selected':''}} value="NR">Not Rated (G)</option>
						<option {{old('rate',$movie->mov_rate)=="G"? 'selected':''}} value="G">General (G)</option>
						<option {{old('rate',$movie->mov_rate)=="PG"? 'selected':''}} value="PG">Parental Guidance Suggested (PG)</option>
						<option {{old('rate',$movie->mov_rate)=="PG-13"? 'selected':''}} value="PG-13">Parents Strongly Cautioned (PG-13)</option>
						<option {{old('rate',$movie->mov_rate)=="R"? 'selected':''}} value="R">Restricted (R)</option>
						<option {{old('rate',$movie->mov_rate)=="NC-17"? 'selected':''}} value="NC-17">Adult Only (NC-17)</option>
					</select>
					@error('rate') <div class="invalid-feedback">{{$message}}</div>
					@enderror
				</div>
				<div class="form-group">
					<label for="time">Time (in minutes)</label>
					<input type="number" class="form-control @error('time') is-invalid @enderror" id="time" aria-describedby="time" placeholder="Input Movie Time" name="time" value="{{$movie->mov_time}}">
					@error('time') <div class="invalid-feedback">{{$message}}</div>
					@enderror
				</div>
				<div class="form-group">
					<label for="genre">Genre</label>
					<input type="text" class="form-control @error('genre') is-invalid @enderror" id="genre" aria-describedby="genre" placeholder="Input Movie Genre" name="genre" value="{{$movie->mov_genre}}">
					@error('genre') <div class="invalid-feedback">{{$message}}</div>
					@enderror
				</div>
				<div class="form-group">
					<label for="direct">Director</label>
					<input type="text" class="form-control @error('director') is-invalid @enderror" id="director" aria-describedby="direct" placeholder="Input Movie Director" name="director" value="{{$movie->mov_direct}}">
					@error('director') <div class="invalid-feedback">{{$message}}</div>
					@enderror
				</div>

				<div class="form-group">
					<label for="storyline">Storyline</label>
					<textarea id="storyline" class="form-control  @error('storyline') is-invalid @enderror" name="storyline">{{$movie->mov_story}}</textarea>
					@error('storyline') <div class="invalid-feedback">{{$message}}</div>
					@enderror
				</div>

				<div align="center">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>

				<script>
					$(".edit").on("submit", function(){
						return confirm("Are you sure?");
					});
				</script>
			</form>	

		</div>
	</div>
</div>

@endsection