<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeaturedReport extends Model
{
    protected $guarded = ['id'];

    protected $hidden = [];

    protected $table = 'featured_report';
}
