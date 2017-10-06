<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class DetAccount extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'detaccounts';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'detaccount_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['account_id', 'detaccount_name','category_id','item_id','destination_id' ,'detaccount_tr', 'debit', 'credit'];

    
}
