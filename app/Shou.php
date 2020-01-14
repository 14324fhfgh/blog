<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shou extends Model
{
    protected $primaryKey="id";
    protected $table='shou';
    public $timestamps=false;
    protected $guarded=[];//黑名单
}
