<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $guarded = ['id'];

    protected $hidden = [];

    protected $table = 'authors';
}
