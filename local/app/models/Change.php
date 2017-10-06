<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Change extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'changes';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'change_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['detaccount_id', 'choise','options', 'value', 'user_id'];

    
}
