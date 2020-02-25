<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\movie;
use Carbon\Carbon;
use File;
use Image;

class MoviesController extends Controller
{
    public function index()
    {
        $movies = movie::all();
        return view('movies', ['movies' => $movies]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'year' => 'required|date_format:Y',
            'rate' => 'required',
            'time' => 'required',
            'genre' => 'required',
            'director' => 'required',
            'storyline' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $this->path = public_path('images');
        $file = $request->file('image');
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        Image::make($file)->save($this->path . '/' . $fileName);

        movie::create([
            'mov_title' => $request->title,
            'mov_year' =>$request->year,
            'mov_rate' =>$request->rate,
            'mov_time' =>$request->time,
            'mov_genre' =>$request->genre,
            'mov_direct' =>$request->director,
            'mov_story' =>$request->storyline,
            'mov_img' =>$fileName
        ]);

        return redirect('/')->with('status','Add New Data Success!');
    }

    public function show(movie $movie)
    {
        return view('movie', compact('movie'));
    }

    public function edit(movie $movie)
    {
         return view('edit', compact('movie'));
    }

     public function imgupdate(Request $request, movie $movie)
    {
         $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $this->path = public_path('images');
        $file = $request->file('image');
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        Image::make($file)->save($this->path . '/' . $fileName);

        $image_path = public_path('images/'.$movie->mov_img);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

         movie::where('id', $movie->id)->update([
            'mov_img' => $fileName
        ]);
         return redirect('/')->with('status','Change Picture Success!');

    }

    public function update(Request $request, movie $movie)
    {
       
        $request->validate([
            'title' => 'required',
            'year' => 'required|date_format:Y',
            'rate' => 'required',
            'time' => 'required',
            'genre' => 'required',
            'director' => 'required',
            'storyline' => 'required'
        ]);

        movie::where('id', $movie->id)->update([
            'mov_title' => $request->title,
            'mov_year' =>$request->year,
            'mov_rate' =>$request->rate,
            'mov_time' =>$request->time,
            'mov_genre' =>$request->genre,
            'mov_direct' =>$request->director,
            'mov_story' =>$request->storyline
        ]);

       return redirect('/')->with('status','Change Data Success!');
    }

    public function destroy(movie $movie)
    {
        $image_path = public_path('images/'.$movie->mov_img);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        movie::destroy($movie->id);
        return redirect('/')->with('status','Delete Data Success!');
    }
}
