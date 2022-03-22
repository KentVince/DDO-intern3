<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mineral extends Model
{
    use HasFactory;
    protected $table='minerals';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable = ['name_of_minerals'];
    //mineral foreign key connection
    public function mineralSpecifications(){
        return $this->hasMany(MineralSpecification::class);

    }
    public function forms()
    {
        return $this->belongsToMany(Forms::class);
    }
}
