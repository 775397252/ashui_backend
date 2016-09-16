<?php
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('/a', function () {
     Log::emergency('测试日志'); 
});
Route::get('excel/export','ExcelController@export');
Route::get('excel/import','ExcelController@import');
/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});
/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/

Route::resource('posts', 'PostController');
// 认证路由...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// 注册路由...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('logs-1',['middleware' => 'auth'],'LogController@logs1');
Route::get('logs-2', ['middleware' => 'auth', 'uses' => 'LogController@logs2']);
//用户管理
Route::group(['prefix' => 'admin', 'namespace' => 'Auth','middleware' =>'auth'], function () {
    Route::get('index', 'UserController@kzt');
    //用户管理
    Route::get('user','UserController@index');
    Route::post('user', ['as' => 'admin.user', 'uses' => 'UserController@add_user']);
    Route::get('user/delete/{id}','UserController@user_delete');
    Route::get('user/edit/{id}','UserController@user_edit');
    Route::post('user/update', ['as' => 'admin.user.update', 'uses' => 'UserController@update_user']);
    //角色管理
    Route::get('role','UserController@role_list');
    Route::get('role/delete/{id}','UserController@role_delete');
    Route::post('role', ['as' => 'admin.role', 'uses' => 'UserController@add_role']);
    Route::get('role/edit/{id}','UserController@role_edit');
    Route::post('role/update', ['as' => 'admin.role.update', 'uses' => 'UserController@update_role']);
    //权限管理
    Route::get('permission','UserController@permission_list');
    Route::get('permission/delete/{id}','UserController@permission_delete');
    Route::get('permission/edit/{id}','UserController@permission_edit');
    Route::post('permission', ['as' => 'admin.permission', 'uses' => 'UserController@add_permission']);
    Route::post('permission/update', ['as' => 'admin.permission.update', 'uses' => 'UserController@update_permission']);
    //菜单管理
    Route::post('menu', ['as' => 'admin.menu', 'uses' => 'UserController@add_menu']);
    Route::get('menu','UserController@menu_list');
    Route::get('menu/edit/{id}','UserController@menu_edit');
    Route::get('menu/delete/{id}','UserController@menu_delete');
    Route::post('menu/update', ['as' => 'admin.menu.update', 'uses' => 'UserController@update_menu']);

});

Route::group(['middleware' =>'auth'], function () {

    //会员
    Route::get('background/members', ['as'=> 'background.members.index', 'uses' => 'Background\MemberController@index']);
    Route::post('background/members', ['as'=> 'background.members.store', 'uses' => 'Background\MemberController@store']);
    Route::get('background/members/create', ['as'=> 'background.members.create', 'uses' => 'Background\MemberController@create']);
    Route::put('background/members/{members}', ['as'=> 'background.members.update', 'uses' => 'Background\MemberController@update']);
    Route::patch('background/members/{members}', ['as'=> 'background.members.update', 'uses' => 'Background\MemberController@update']);
    Route::delete('background/members/{members}', ['as'=> 'background.members.destroy', 'uses' => 'Background\MemberController@destroy']);
    Route::get('background/members/{members}', ['as'=> 'background.members.show', 'uses' => 'Background\MemberController@show']);
    Route::get('background/members/{members}/edit', ['as'=> 'background.members.edit', 'uses' => 'Background\MemberController@edit']);

    //阿水分享
    Route::get('background/ashuiConfessions', ['as'=> 'background.ashuiConfessions.index', 'uses' => 'Background\AshuiConfessionController@index']);
    Route::post('background/ashuiConfessions', ['as'=> 'background.ashuiConfessions.store', 'uses' => 'Background\AshuiConfessionController@store']);
    Route::get('background/ashuiConfessions/create', ['as'=> 'background.ashuiConfessions.create', 'uses' => 'Background\AshuiConfessionController@create']);
    Route::put('background/ashuiConfessions/{ashuiConfessions}', ['as'=> 'background.ashuiConfessions.update', 'uses' => 'Background\AshuiConfessionController@update']);
    Route::patch('background/ashuiConfessions/{ashuiConfessions}', ['as'=> 'background.ashuiConfessions.update', 'uses' => 'Background\AshuiConfessionController@update']);
    Route::delete('background/ashuiConfessions/{ashuiConfessions}', ['as'=> 'background.ashuiConfessions.destroy', 'uses' => 'Background\AshuiConfessionController@destroy']);
    Route::get('background/ashuiConfessions/{ashuiConfessions}', ['as'=> 'background.ashuiConfessions.show', 'uses' => 'Background\AshuiConfessionController@show']);
    Route::get('background/ashuiConfessions/{ashuiConfessions}/edit', ['as'=> 'background.ashuiConfessions.edit', 'uses' => 'Background\AshuiConfessionController@edit']);
   //阿水表白
    Route::get('background/biaobais', ['as'=> 'background.biaobais.index', 'uses' => 'Background\BiaobaiController@index']);
    Route::post('background/biaobais', ['as'=> 'background.biaobais.store', 'uses' => 'Background\BiaobaiController@store']);
    Route::get('background/biaobais/create', ['as'=> 'background.biaobais.create', 'uses' => 'Background\BiaobaiController@create']);
    Route::put('background/biaobais/{biaobais}', ['as'=> 'background.biaobais.update', 'uses' => 'Background\BiaobaiController@update']);
    Route::patch('background/biaobais/{biaobais}', ['as'=> 'background.biaobais.update', 'uses' => 'Background\BiaobaiController@update']);
    Route::delete('background/biaobais/{biaobais}', ['as'=> 'background.biaobais.destroy', 'uses' => 'Background\BiaobaiController@destroy']);
    Route::get('background/biaobais/{biaobais}', ['as'=> 'background.biaobais.show', 'uses' => 'Background\BiaobaiController@show']);
    Route::get('background/biaobais/{biaobais}/edit', ['as'=> 'background.biaobais.edit', 'uses' => 'Background\BiaobaiController@edit']);
    //阿水服务
    //打印
    Route::get('background/ashuiServiceprint', ['as'=> 'background.ashuiServiceprint.index', 'uses' => 'Background\AshuiServiceController@printlist']);
    Route::get('background/ashuiServiceprint/deleteprint/{id}', ['as'=> 'background.ashuiServiceprint.deleteprint', 'uses' => 'Background\AshuiServiceController@deleteprint']);
    //图书
    Route::get('background/ashuiServicebook', ['as'=> 'background.ashuiServicebook.index', 'uses' => 'Background\AshuiServiceController@booklist']);
    Route::get('background/ashuiServicebook/add', ['as'=> 'background.ashuiServicebook.add', 'uses' => 'Background\AshuiServiceController@addbook']);
    Route::post('background/ashuiServicebook/store', ['as'=> 'background.ashuiServicebook.store', 'uses' => 'Background\AshuiServiceController@storebook']);
    Route::get('background/ashuiServicebook/deletebook/{id}', 'Background\AshuiServiceController@deletebook');




    Route::get('/storage/uploads/{aa}', function($aa){
        return response()->download(storage_path('uploads').'//'.$aa);
    });

});
/*
|--------------------------------------------------------------------------
| Home routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'Home\IndexController@index');
Route::any('/login', 'Home\UserController@login');
Route::any('/logout', 'Home\UserController@logout');
Route::any('/register', 'Home\UserController@register');
Route::get('/captcha/{tmp}', 'Home\UserController@captcha');
//阿水分享
Route::get('/ashui/share', 'Home\ShareController@index');
Route::get('/ashui/share/comment', 'Home\ShareController@comment');
Route::get('/ashui/share/click', 'Home\ShareController@click');
//阿水服务
Route::get('/ashui/service/upprint', 'Home\ServiceController@upprint');
Route::post('/ashui/service/printprice', 'Home\ServiceController@printprice');
Route::get('/ashui/service/ashui_book', 'Home\ServiceController@ashui_book');
//阿水表白
Route::get('/ashui/meet', 'Home\MeetController@index');
Route::get('/ashui/meet/comment', 'Home\MeetController@comment');
Route::get('/ashui/meet/click', 'Home\MeetController@click');
Route::any('/ashui/meet/wall', 'Home\MeetController@wall');
Route::any('/ashui/meet/dove', 'Home\MeetController@dove');
//阿水广场
Route::get('/ashui/place', 'Home\PlaceController@index');
Route::get('/ashui/place/comment', 'Home\PlaceController@comment');
Route::get('/ashui/place/click', 'Home\PlaceController@click');
Route::any('/ashui/place/yifa', 'Home\PlaceController@yifa');
Route::any('/ashui/place/especially', 'Home\PlaceController@especially');
//留言版
Route::any('/ashui/messageboard/{id}', 'Home\UserController@MessageBoard');
Route::any('/ashui/attend', 'Home\UserController@attend');
