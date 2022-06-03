<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    protected $table3 = 'images';
    protected $fillable = [
         'name','path','size'
    ];
}