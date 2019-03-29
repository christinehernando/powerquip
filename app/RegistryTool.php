<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class RegistryTool extends Model
{
    //
     use SoftDeletes;

    //  protected $fillable = [
    //    name in the form of add blade 
    // ];

    protected $dates = ['deleted_at'];

    
}
