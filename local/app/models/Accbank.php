<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Accbank extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'accbanks';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'accbank_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['coa_code', 'bank_id', 'owner_id', 'reknumber','currency','accbanks_desc', 'user_id'];

    
}
