<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newbook extends Model
{
    protected $primaryKey='new_id';
    protected $table='newbook';
    public $timestamps=false;
    protected $guarded=[];//黑名单
}
