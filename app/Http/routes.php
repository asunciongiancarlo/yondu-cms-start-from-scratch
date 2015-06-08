<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'MainController@index');

Route::resource('cms', 'CMS\CMSController', ['only' => ['index'], 'middleware'=>'is.allowed']);
Route::get('cms/user/profile',
            array('as' => 'cms.user.profile', 
                  'uses' => 'CMS\UserController@profile'));

Route::resource('cms/user', 'CMS\UserController');

Route::resource('cms/role', 'CMS\RoleController', ['except' => ['show']]);

Route::resource('module', 'CMS\ModuleController', ['except' => ['show']]);

Route::post('cms/role/modify', array('as' => 'cms.role.modifyAccess', 'uses' => 'CMS\RoleController@modifyAccess'));

Route::post('cms/roleaccess/modify', array('as' => 'cms.roleaccess.modifyAccess', 'uses' => 'CMS\RoleAccessesController@modifyAccess'));

Route::post('cms/access/modify', array('as' => 'cms.access.modifyAccess', 'uses' => 'CMS\AccessController@modifyAccess'));

Route::resource('cms/access', 'CMS\AccessController');

Route::resource('cms/roleaccess', 'CMS\RoleAccessesController', ['except' => ['show']]);

// Setting Route Start
Route::resource('cms/general_settings', 'CMS\GeneralSettingsController',['only' => ['index', 'update']]);
Route::get('cms/general_settings/truncateData', array('as' => 'cms.general_settings.truncateData', 'uses' => 'CMS\GeneralSettingsController@truncateData'));
// Setting Route End

//Start Gian Modules
//General Setting Controller
Route::resource('general_settings', 'CMS\GeneralSettingsController', ['middleware'=>'is.allowed']);
//News Feeds Controller
Route::resource('news_feeds', 'CMS\NewsFeedsController');
//Captcha Controller
Route::get('captcha-generator', 'CMS\CaptchaController@index');
//Change Password Controller Front-End
Route::resource('change_password', 'CMS\ChangePasswordController');
//Change Password Controller Back-End
Route::resource('cms/change_password_user', 'CMS\ChangePasswordInsideSystemController', ['middleware'=>'is.allowed']);
//End Gian Modules

//Authentication and Forgot Password Module: Start
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
//Authentication and Forgot Password Module: End


//These routes are for Error Pages
Route::get('notfound', 'ErrorController@index');

//These routes are for Module Management Start
Route::get('modules', 'ModuleController@index');
Route::resource('modules', 'ModuleController');
Route::post('modules/toggle', ['as' => 'togglemodule', 'uses' => 'ModuleController@toggleModule']);
Route::post('modules/upload', 'ModuleController@upload');

require_once(__DIR__ . '/../Modules/Module_Routes.php');
//These routes are for Module Management End