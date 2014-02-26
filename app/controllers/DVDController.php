<?php
class DVDController extends BaseController {

    public function listMovies(){
        $dvd_title = Input::get('title');
        $ratings = Input::get('ratings');
        $genres = Input::get('genres');


        if($genres != -1 && $ratings != -1){
        $movies = Dvd::with('format', 'genre', 'label','rating','sound')
            ->where('genre_id', '=', $genres)
            ->where('rating_id', '=', $ratings)
            ->where('title','LIKE', "%$dvd_title%")
            ->take(30)
            ->get();

        //$dvds = Dvd::listMovies($dvd_title, $ratings, $genres);
        return View::make('dvds/results', [
            'dvds' => $movies
        ]);
        }

        if($genres == -1 && $ratings != -1 ){
            $movies = Dvd::with('format', 'genre', 'label','rating','sound')
                ->where('rating_id', '=', $ratings)
                ->where('title','LIKE', "%$dvd_title%")
                ->take(30)
                ->get();

            //$dvds = Dvd::listMovies($dvd_title, $ratings, $genres);

            return View::make('dvds/results', [
                'dvds' => $movies
            ]);
        }
        if($ratings != -1 && $genres != -1){
            $movies = Dvd::with('format', 'genre', 'label','rating','sound')
                ->where('genre_id', '=', $genres)
                ->where('title','LIKE', "%$dvd_title%")
                ->take(30)
                ->get();

            //$dvds = Dvd::listMovies($dvd_title, $ratings, $genres);

            return View::make('dvds/results', [
                'dvds' => $movies
            ]);
        }
        if($genres == -1 && $ratings == -1){
            $movies = Dvd::with('format', 'genre', 'label','rating','sound')
                ->where('title','LIKE', "%$dvd_title%")
                ->take(30)
                ->get();

            //$dvds = Dvd::listMovies($dvd_title, $ratings, $genres);
            //dd($movies->toArray());
            return View::make('dvds/results', [
                'dvds' => $movies
            ]);
        }

    }

    public function add(){
        $movie = new Dvd();
        $movie->title = Input::get('title');
        $movie->genre_id = Input::get('genres');
        $movie->rating_id = Input::get('ratings');
        $movie->save();

        return Redirect::to('dvds/create')
            ->with('success', 'The Song Was Inserted Successfully!');

    }

    public function getBoxes(){
        $ratings = $this->giveRatings();
        $genres = $this->giveGenres();

        return View::make('dvds/search', [
            'ratings' => $ratings,
            'genres' => $genres
        ]);
    }

    public function getBoxes2(){
        $ratings = $this->giveRatings();
        $genres = $this->giveGenres();

        return View::make('dvds/create', [
            'ratings' => $ratings,
            'genres' => $genres
        ]);
    }

    public function giveRatings(){
        $ratings = Rating::all();
        return $ratings;
    }

    public function giveGenres(){
        $genres = Genre::all();
        return $genres;
    }

} 