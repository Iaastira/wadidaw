<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Gallery extends Model
{
    use LogsActivity;

    protected $fillable = [
        'image'
    ];

    public $timestamps = true;

    protected static $logFillable = true;
}
