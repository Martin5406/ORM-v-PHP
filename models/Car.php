<?php
namespace Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public $timestamps = false;
    protected $table = 'cars';

    public function model()
    {
        return $this->belongsTo(VehicleModel::class, 'id_model');
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'id_owner');
    }
}