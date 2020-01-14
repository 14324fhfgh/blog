<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deng extends Model
{
    protected $primaryKey='id';
    protected $table='deng';
    public $timestamps=false;
    protected $guarded=[];//黑名单
}
