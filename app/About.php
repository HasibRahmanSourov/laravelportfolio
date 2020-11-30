<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'titel', 'sub_title', 'description', 'image'
    ];
}
