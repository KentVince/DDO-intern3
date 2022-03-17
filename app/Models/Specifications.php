<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MineralSpecification extends Model
{
    use HasFactory;
    protected $table='specification';
    protected $primaryKey='id';
    // A mineral specification belongs to a mineral.
    // foreign key connection
    public function mineral(){
        return $this->belongsTo(Mineral::class);
    }
}
