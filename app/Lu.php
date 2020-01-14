<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lu extends Model
{
    protected $primaryKey='id';
    protected $table='lu';
    public $timestamps=false;
    protected $guarded=[];//黑名单
}
