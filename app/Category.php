<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey='cate_id';
    protected $table='category';
    public $timestamps=false;
    protected $guarded=[];//黑名单
}
