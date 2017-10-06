<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'banks';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'bank_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['bank_name', 'user_id'];

    
}
