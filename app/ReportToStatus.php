<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportToStatus extends Model
{
    protected $guarded = ['id'];

    protected $hidden = [];

    protected $table = 'reports_to_status';
}
