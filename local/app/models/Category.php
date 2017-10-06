<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categorys';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'category_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['category_name', 'users_id'];

    
}
