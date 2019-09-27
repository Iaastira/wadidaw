<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class About extends Model
{
    use LogsActivity;

    protected $fillable = [
        'title','desc'
    ];

    public $timestamps = true;

    protected static $logFillable = true;
}
