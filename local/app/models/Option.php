<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'options';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'option_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['option_name', 'user_id'];

    
}
