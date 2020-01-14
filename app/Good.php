<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $primaryKey="good_id";
    protected $table='good';
    public $timestamps=false;
    protected $guarded=[];//黑名单
}
