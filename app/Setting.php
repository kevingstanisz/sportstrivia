<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    // Table Name 
    protected $table = 'settings';

    //Primary Key 
    public $primaryKey = 'id';

    //Timestamps 
    public $timestamps = true; 
}
