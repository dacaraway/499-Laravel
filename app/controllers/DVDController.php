<?php
class DVDController extends BaseController {

    public function listMovies(){
        $dvd_title = Input::get('title');
        $ratings = Input::get('ratings');
        $genres = Input::get('genres');

        $dvds = Dvd::listMovies($dvd_title, $ratings, $genres);

        return View::make('dvds/results', [
            'dvds' => $dvds
        ]);
    }

    public function getBoxes(){
        $ratings = $this->giveRatings();
        $genres = $this->giveGenres();

        return View::make('dvds/search', [
            'ratings' => $ratings,
            'genres' => $genres
        ]);
    }

    public function giveRatings(){
        $ratings = Dvd::getRatings();
        return $ratings;
    }

    public function giveGenres(){
        $genres = Dvd::getGenres();
        return $genres;
    }

} 