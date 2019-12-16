<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    public $table = 'movies';
    public $timestamps = true;

    protected $fillable = ['title', 'rating', 'awards', 'genre_id'];

    public function getAtributos() {
        return $this->attributes;
    }
}
