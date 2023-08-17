<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post{

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all() {

        return collect(File::files(resource_path("posts")))
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            ->map(fn($document) => new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug
            ))
            ->sortByDesc('date');

        // return cache()->remember('post.all', 50 ,function(){
        //     //For Caching
        // });

    }

    public static function find($slug){
        // of all the blog posts, find the one with the slug that match

        return static::all()->firstWhere('slug', $slug);
    }

    public static function findOrFail($slug){
        // of all the blog posts, find the one with the slug that match

        $post =  static::find($slug);

        if(!$post){
            throw new ModelNotFoundException;
        }

        return $post;
    }
}