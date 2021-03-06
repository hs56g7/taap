<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorsToReports extends Model
{
    protected $guarded = ['id'];

    protected $hidden = [];

    protected $table = 'authors_to_reports';
}
