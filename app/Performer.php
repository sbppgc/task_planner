<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performer extends Model
{
    protected $fillable = [
        'name',
        'position',
    ];
}
