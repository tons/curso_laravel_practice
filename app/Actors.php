<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actors extends Model
{
    public $table = 'actors';
    public $timestamps = true;

    protected $fillable = ['first_name', 'last_name', 'rating', 'favorite_movie_id'];

    public function getNombreCompleto() {
        return $this->first_name . ' '. $this->last_name;
    }
    public function getAtributos() {
        return $this->attributes;
    }
}
