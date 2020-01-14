<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wei extends Model
{
    protected $primaryKey='id';
    protected $table='wei';
    public $timestamps=false;
    protected $guarded=[];//黑名单
}
