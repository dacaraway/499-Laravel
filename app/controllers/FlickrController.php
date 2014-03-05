<?php

class FlickrController extends BaseController {


    public function search(){
        return View::make("flickr/search", [
        ]);
    }

    public function getResults(){
        $tag = Input::get('tag');
        $flickr = new \Itp\API\FlickrSearch($tag);
        $json = $flickr->getResults();
        $results = $json->photos->photo;

        return View::make("flickr/results", [
            'results' => $results
        ]);
    }
} 