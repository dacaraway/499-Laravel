<?php
class DVDController extends BaseController {

    public function search(){
        return View::make('dvd/search');
    }

    public function listSongs(){
        $song_title = Input::get('song_title');
        $artist = Input::get('artist');

        $dvds = Dvd::search($song_title, $artist);

//    dd($dvds);
        return View::make('dvds/results', [
            'dvds' => $dvds
        ]);
    }

    public function giveRatings(){
        $ratings = Dvd::getRatings();

        return View::make('dvds/search', [
           'ratings' => $ratings
        ]);
    }

    public function giveGenres(){
        $genres = Dvd::getGenres();

        return View::make('dvds/search', [
            'genres' => $genres
        ]);
    }

} 