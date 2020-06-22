<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordinator extends Model
{
    protected $table='carrera_user';

    protected $primaryKey='id';

    protected $fillable = [
        'carrera_id', 
        'user_id',
    ];
}
