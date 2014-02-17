<?php
class DVD {
    /*
    public static function search($song_title, $artist) {

        $query = DB::table('dvds')
            ->select('title', 'artist_name', 'genre', 'added', DB::raw("DATE_FORMAT(added, '%b %d %Y %h:%i %p') AS added"))
            ->join('artists', 'artists.id', '=', 'dvds.artist_id')
            ->join('genres', 'genres.id', '=', 'dvds.genre_id');

         if($song_title){
             $query->where('title','LIKE', "%$song_title%");
         }

        if($artist){
            $query->where('artist_name','LIKE', "%$artist%");
         }
        $songs = $query->get();
        return $songs;
    }
*/
    public static function getRatings(){
        $query = DB::table('ratings')
            ->select('rating');

        $ratings = $query->get();
        return $ratings;
    }
    public static function getGenres(){
        $query = DB::table('genres')
            ->select('genre');

        $genres = $query->get();
        return $genres;
    }

}
?>