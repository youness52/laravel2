<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cat extends Model
{
    protected $table = 'categories';
    protected $fillable = [
         'title'
    ];
}
