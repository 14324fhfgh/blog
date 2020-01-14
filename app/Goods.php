<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $primaryKey="goods_id";
    protected $table='goods';
    public $timestamps=false;
    protected $guarded=[];//黑名单
}
