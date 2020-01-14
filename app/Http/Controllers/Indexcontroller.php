<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Indexcontroller extends Controller
{
     public function index(){
        $name="忍忍"; 
        return view('hello',['name'=>$name]);
     }
     public function login(){
        return view('login');
    }
     public function dologin(){
         $post=request()->all();
         dd($post);
     }
    // public function goods($id){
    //    echo 'Id是'.$id;
    // }
    public function getgoods($goods_id,$goods_name='的韩国代购'){
        echo 'Id是'.$goods_id;
        echo '名称是'.$goods_name;
    } 
}
