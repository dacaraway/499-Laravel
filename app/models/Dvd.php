<?php
class DVD {

    public static function listMovies($dvd_title, $rating, $genre) {

        $query = DB::table('dvds')
            ->select('title', 'rating_name','dvds.rating_id', 'dvds.genre_id','genre_name', 'label_name','sound_name','format_name', DB::raw("DATE_FORMAT(release_date, '%b %d %Y') AS release_date"))
            ->join('ratings', 'ratings.id', '=', 'dvds.rating_id')
            ->join('genres', 'genres.id', '=', 'dvds.genre_id')
            ->join('labels', 'labels.id', '=', 'dvds.label_id')
            ->join('sounds', 'sounds.id', '=', 'dvds.sound_id')
            ->join('formats', 'formats.id', '=', 'dvds.format_id');

        if($rating != -1){
            $query->where('rating_id', '=', $rating);
        }
        if($genre != -1){
            $query->where('genre_id', '=', $genre);
        }

         if($dvd_title){
             $query->where('title','LIKE', "%$dvd_title%");
         }

        $dvds = $query->get();

        return $dvds;
    }

    public static function getRatings(){
        $query = DB::table('ratings')
            ->select('rating_name','id');

        $ratings = $query->get();
        return $ratings;
    }
    public static function getGenres(){
        $query = DB::table('genres')
            ->select('genre_name', 'id');

        $genres = $query->get();
        return $genres;
    }

}
?>