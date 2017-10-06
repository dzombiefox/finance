<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'accounts';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'account_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['account_date','accbank_id', 'account_total', 'users_id'];

    
}
