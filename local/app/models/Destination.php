<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'destinations';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'destination_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['destination_name', 'user_id'];

    
}
