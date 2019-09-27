<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Services extends Model
{
    use LogsActivity;

    protected $fillable = [
        'image','title','desc'
    ];

    public $timestamps = true;

    protected static $logFillable = true;

}
