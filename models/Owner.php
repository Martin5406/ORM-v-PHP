<?php
namespace Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    public $timestamps = false;
    protected $table = 'owners';

    public function cars()
    {
        return $this->hasMany(Car::class, 'id_owner');
    }
}