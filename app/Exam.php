<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $primaryKey="id";
    protected $table='exam';
    public $timestamps=false;
    protected $guarded=[];//黑名单

}
