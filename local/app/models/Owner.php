<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'owners';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'owner_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['owner_name', 'user_id'];

    
}
