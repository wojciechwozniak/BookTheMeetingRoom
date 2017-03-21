<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table='my_events';
    public $timestamps=false;
    protected $primaryKey='my_id';

}
