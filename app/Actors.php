<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actors extends Model
{
    public $table = 'actors';

    public function getNombreCompleto() {
        return $this->first_name . ' '. $this->last_name;
    }
    public function getAtributos() {
        return $this->attributes;
    }
}
