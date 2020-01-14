<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//闭包路由
Route::get('hello', function () { 
    return 'Hello, Welcome to LaravelAcademy.org'; 
});
//控制器方法路由
Route::get('/aa','Indexcontroller@index');
//路由试图
Route::view('/bb','hello',['name'=>'张三']);

//Route::view('/login','login');
//支持多个的match any
//Route::get('/login','Indexcontroller@login');
//Route::post('/dologin','Indexcontroller@dologin');
//必填路由
// Route::get('/goods/{id}',function ($id){
//     echo $id;
// });


//Route::get('/goods/{id}','Indexcontroller@goods');

//Route::get('/goods/{id}/{name?}','Indexcontroller@getgoods')->where('id','\id+');


Route::prefix('brand')->middleware('checklogin')->group(function(){
    Route::get('/create','Brandcontroller@create');
    Route::post('/store','Brandcontroller@store');
    Route::get('/','Brandcontroller@index');
    Route::get('/edit/{id}','Brandcontroller@edit');
    Route::post('/update/{id}','Brandcontroller@update');
    Route::get('/del/{id}','Brandcontroller@destroy');
});





// Route::get('/create','Student@create');
// Route::post('/store','Student@store');
// Route::get('/index','Student@index');
// Route::get('/student/edit/{id}','Student@edit');
// Route::post('/student/update/{id}','Student@update');
// Route::get('/student/del/{id}','Student@destory');




// Route::get('/create','Yuancontroller@create');
// Route::post('/store','Yuancontroller@store');
// Route::get('/index','Yuancontroller@index');
// Route::get('/edit/{id}','Yuancontroller@edit');
// Route::post('/update/{id}','Yuancontroller@update');



// Route::get('/create','Acontroller@create');
// Route::post('/store','Acontroller@store');
// Route::get('/index','Acontroller@index');
// Route::get('/edit/{id}','Acontroller@edit');
// Route::post('/update/{id}','Acontroller@update');
// Route::get('/destroy/{id}','Brandcontroller@destroy');



// Route::get('/create','Bookcontroller@create');
// Route::post('/store','Bookcontroller@store');
// Route::get('/index','Bookcontroller@index');


// Route::get('/create','Categorycontroller@create');
// Route::post('/store','Categorycontroller@store');
// Route::get('/index','Categorycontroller@index');
// Route::get('/edit/{id}','Categorycontroller@edit');
// Route::post('/update/{id}','Categorycontroller@update');
// Route::get('/destroy/{id}','Categorycontroller@destroy');



// Route::get('/create','Goods1controller@create');
// Route::post('/store','Goods1controller@store');
// Route::get('/index','Goods1controller@index')->middleware('checklogin');
// Route::get('/edit/{id}','Goods1controller@edit');
// Route::post('/update/{id}','Goods1controller@update');
// Route::get('/destroy/{id}','Goods1controller@destroy');



// Route::get('/create','Newbookcontroller@create');
// Route::post('/store','Newbookcontroller@store');
// Route::get('/index','Newbookcontroller@index');



//  Route::get('/create','Dengcontroller@create');
//  Route::post('/store','Dengcontroller@store');
//  Route::get('/logout','Dengcontroller@logout');


// Route::get('/create','Weicontroller@create');
// Route::post('/store','Weicontroller@store');
// Route::get('/index','Weicontroller@index')->middleware('checklogin');
// Route::get('/edit/{id}','Weicontroller@edit');
// Route::post('/update/{id}','Weicontroller@update');
// Route::get('/destroy/{id}','Weicontroller@destroy');
//Route::post('/destroy/{id}','Weicontroller@destroy');



// Route::get('/create','Lucontroller@create');
// Route::post('/store','Lucontroller@store');
// Route::get('/logout','Lucontroller@logout');




// Route::get('/create','DController@create');
// Route::post('/store','DController@store');
// Route::get('/logout','DController@logout');


// Route::get('/create','Goodcontroller@create');
// Route::post('/store','Goodcontroller@store');
// Route::get('/index','Goodcontroller@index');
// Route::get('/destroy/{id}','Goodcontroller@destroy');
// Route::get('checkOnly','Goodcontroller@checkOnly');





Route::prefix('goods')->group(function(){
        Route::get('/create','Goodscontroller@create');
        Route::post('/store','Goodscontroller@store');
        Route::get('/','Goodscontroller@index');
        Route::get('/edit/{id}','Goodscontroller@edit');
        Route::post('/update/{id}','Goodscontroller@update');
        Route::get('/del/{id}','Goodscontroller@destroy');
        Route::get('/show/{id}','Goodscontroller@show');
        Route::post('/addcart','Goodscontroller@addcart');
    });


// Route::get('/create','Shoucontroller@create');   
// Route::post('/store','Shoucontroller@store'); 
// Route::get('/index','Shoucontroller@index'); 
// Route::get('/destroy/{id}','Shoucontroller@destroy');

// Route::get('/wet',function(){
//     return response('hello')->cookie('name','张三',2);
// });
// Route::get('/get',function(){
//     return request()->cookie('name');
// });
// //第二中添加cookie
// Route::get('/wet2',function(){
//     Illuminate\Support\Facades\Cookie::queue('name','lisi',1);
//     echo request()->cookie('name');
// });



// Route::get('send','Goodscontroller@sendemail');




// Route::get('/create','Dangcontroller@create'); // Route::get('/create','Usercontroller@create');
    // Route::post('/store','Usercontroller@store');
    // Route::get('/index','Usercontroller@index');
    // Route::get('/edit/{id}','Usercontroller@edit');
    // Route::post('/update/{id}','Usercontroller@update');
    // Route::get('/del/{id}','Usercontroller@destroy');
   
// Route::post('/store','Dangcontroller@store');
// Route::get('/logout','Dangcontroller@logout');




Route::get('/create','Deng1controller@create');
Route::post('/store','Deng1controller@store');
Route::get('/logout','Deng1controller@logout');


Route::prefix('exam')->group(function(){
     Route::get('create','Examcontroller@create');
     Route::post('store','Examcontroller@store');
    Route::get('/','Examcontroller@index')->middleware('checklogin');
    // Route::get('/edit/{id}','Examcontroller@edit');
    // Route::post('/update/{id}','Examcontroller@update');
     Route::post('destroy/{id}','Examcontroller@destroy');
    // Route::get('/show/{id}','Examcontroller@show');
    // Route::post('/addcart','Examcontroller@addcart');
});


    // Route::get('/create','Liucontroller@create');
    // Route::post('/store','Liucontroller@store');

   
