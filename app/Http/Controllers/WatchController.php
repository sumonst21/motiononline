<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Season;
use App\Episode;

class WatchController extends Controller
{
    public function watch($id)
    {
    	$movie = Movie::findorfail($id);
    	return view('watch',compact('movie'));
    }

    public function watchTV($id)
    {
    	$season = Season::find($id);
        
    	return view('watchTvShow',compact('season'));
    }

    public function watchMovie($id)
    {
        $movie = Movie::findorfail($id);
        return view('watchMovie',compact('movie'));
    }

    public function watchEpisode($id)
    {  
        $episode = Episode::find($id);
        $season  = Season::find($episode->seasons_id);
        return view('episodeplayer',compact('episode','season'));
    }
}
