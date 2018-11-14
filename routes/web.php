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

Route::get('/', [

    'uses'=>'HomeController@index',
    'as'=>'home'

])->name('home');

Route::get('/publications', [

    'uses'=>'PublicationsController@index'

]);

Route::get('/members', [

    'uses'=>'MembersController@index'

]);

Route::get('/admin', [

    'uses'=>'AdminController@index',
    'as'=>'admin'

])->name('admin');

Route::post('/adminlogin', [

    'uses'=>'AdminController@login'

]);

Route::post('/adminlogout', [

    'uses'=>'AdminController@logout',
    'as'=>'logout'

]);

Route::get('/admindashboard', [

    'uses'=>'AdminController@dashboard'

]);

Route::get('/admindashboard2', [

    'uses'=>'AdminController@dashboard2'

]);

Route::get('/admindashboard3', [

    'uses'=>'AdminController@dashboard3'

]);

Route::get('/admindashboard4', [

    'uses'=>'AdminController@dashboard4'

]);
Route::get('/admindashboard5', [

    'uses'=>'AdminController@dashboard5'

]);



//member start
Route::post('/create/member', [
    
    'uses'=>'AdminController@dbmember'
    
]);

Route::get('/delete/member/{id}', [
    
    'uses'=>'AdminController@deletemember',
    'as'=>'delete.member'
    
]);

Route::get('/update/member/{id}', [
    
    'uses'=>'AdminController@updatemember',
    'as'=>'update.member'
    
]);
Route::post('/save/member/{id}', [
    
    'uses'=>'AdminController@savemember',
    'as'=>'save.member'
    
]);
//member end


//publication start
Route::post('/create/publications', [
    
    'uses'=>'AdminController@dbpublications'
    
]);

Route::get('/delete/publications/{id}', [
    
    'uses'=>'AdminController@deletepublications',
    'as'=>'delete.publications'
    
]);

Route::get('/update/publications/{id}', [
    
    'uses'=>'AdminController@updatepublications',
    'as'=>'update.publications'
    
]);
Route::post('/save/publications/{id}', [
    
    'uses'=>'AdminController@savepublications',
    'as'=>'save.publications'
    
]);
Route::post('/search/publications', [
    
    'uses'=>'AdminController@searchpublications',
    'as'=>'search.publications'
    
]);
//publication end



//member details
Route::get('/memberdetail/{id}', [
    
    'uses'=>'MembersController@memberdetail',
    'as'=>'memberdetail'
    
]);

   //contact view     
Route::get('/contact', [
        
    'uses'=>'ContactController@index'
        
]);
Route::post('/contact', [
        
    'uses'=>'ContactController@email'
        
]);

// project view
Route::get('/project', [
    
    'uses'=>'ProjectController@index',
    'as'=>'project'
    
]);

//project details start
Route::get('/projectdetails/{id}', [
    
    'uses'=>'ProjectController@projectdetails'
    
]);

Route::post('/create/project', [
    
    'uses'=>'ProjectController@createproject'
    
]);
Route::get('/delete/project/{id}', [
    
    'uses'=>'ProjectController@deleteproject',
    'as'=>'delete.project'
]);
Route::get('/update/project/{id}', [
    
    'uses'=>'ProjectController@updateproject',
    'as'=>'update.project'
]);
Route::post('/save/project/{id}', [
    
    'uses'=>'ProjectController@saveproject',
    'as'=>'save.project'
]);
//project end



//Open position start
Route::get('openpositions', [
    
    'uses'=>'OpenpositionController@index',
    
]);
Route::post('/create/Openposition', [
    
    'uses'=>'OpenpositionController@createOpenposition'
    
]);
Route::get('/delete/Openposition/{id}', [
    
    'uses'=>'OpenpositionController@deleteOpenposition',
    'as'=>'delete.Openposition'
]);
Route::get('/update/Openposition/{id}', [
    
    'uses'=>'OpenpositionController@updateOpenposition',
    'as'=>'update.Openposition'
]);
Route::post('/save/Openposition/{id}', [
    
    'uses'=>'OpenpositionController@saveOpenposition',
    'as'=>'save.Openposition'
]);


Route::get('deliverable', [
    
    'uses'=>'DeliverableController@index',
    
]);
Route::post('/create/deliverable', [
    
    'uses'=>'DeliverableController@createdeliverable'
    
]);
Route::get('/delete/deliverable/{id}', [
    
    'uses'=>'DeliverableController@deletedeliverable',
    'as'=>'delete.deliverable'
]);
Route::get('/update/deliverable/{id}', [
    
    'uses'=>'DeliverableController@updatedeliverable',
    'as'=>'update.deliverable'
]);
Route::post('/save/deliverable/{id}', [
    
    'uses'=>'DeliverableController@savedeliverable',
    'as'=>'save.deliverable'
]);
