<?php

namespace App\Http\Controllers;

use App\Config;
use App\Movie;
use App\MovieSeries;
use App\Season;
use App\TvSeries;
use Illuminate\Http\Request;

class PrimeDetailController extends Controller
{
  /**
   * @param $id
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
   */
    public function showMovie($id) {
        $movie =  Movie::findOrFail($id);
        $type_check = "M";
        $movies = Movie::all();
        $config = Config::findOrFail(1);
        $filter_series = collect();

        views($movie)->record();

        if ($movie->series == 1) {
          $single_series_list = MovieSeries::where('series_movie_id', $id)->first();
          if (isset($single_series_list)) {
            $main_movie_series = Movie::where('id', $single_series_list->movie_id)->first();
            $filter_series->push($main_movie_series);
            $series_list = (MovieSeries::where([['movie_id', $main_movie_series->id], ['series_movie_id', '!=', $id]])->get());
            foreach ($series_list as $item) {
              $filter_movie_exc_self = Movie::where('id', $item->series_movie_id)->first();
              $filter_series->push($filter_movie_exc_self);
            }
          }
        }

        if ($config->prime_movie_single == 1)
        {
          return view('movie_single_prime', compact('movie', 'movies', 'filter_series', 'type_check'));
        } else {
          return view('movie_single', compact('movie', 'movies', 'filter_series', 'type_check'));
        }
      }

      public function showSeasons($id) {
        $season = Season::findOrFail($id);
         $type_check = "S";
        $movies = Movie::all();
        views($season)->record();
        $config = Config::findOrFail(1);
        if ($config->prime_movie_single == 1)
        {
          return view('movie_single_prime', compact('season', 'movies', 'type_check'));
        } else {
          return view('movie_single', compact('season', 'movies', 'type_check'));
        }
      }

}
