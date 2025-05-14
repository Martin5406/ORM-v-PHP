<?php
namespace Models;

use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    public $timestamps = false;
    protected $table = 'models';
    protected $fillable = ['model_name', 'id_manufacturer'];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'id_manufacturer');
    }

    public function cars()
    {
        return $this->hasMany(Car::class, 'id_model');
    }
}