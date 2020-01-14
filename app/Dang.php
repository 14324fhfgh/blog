<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dang extends Model
{
    protected $primaryKey='id';
    protected $table='dang';
    public $timestamps=false;
    protected $guarded=[];//黑名单
}
