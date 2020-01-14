<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liu extends Model
{
    protected $primaryKey="uid";
    protected $table='liu';
    public $timestamps=false;
    protected $guarded=[];//黑名单
}
