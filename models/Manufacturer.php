<?php
namespace Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    public $timestamps = false;
    protected $table = 'manufacturers';
    protected $fillable = ['manufacturer_name'];

    public function models()
    {
        return $this->hasMany(VehicleModel::class, 'id_manufacturer');
    }
}