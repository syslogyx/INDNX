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
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('common_template');
});

// Route::get('/login', function () {
//     return view('login');
// });

Auth::routes();

// Route::get('/home', function(){
//     if (Auth::user()->name == 'Admin')
//     {
//         //define route to call the TeamController index method
// 		Route::get('/home','TeamController@index');
//     } else {
// 		print_r(Auth::user()->name);
//         Route::get('/home', 'HomeController@index');
//     }
// });

Route::get('/home', 'HomeController@index')->name('home');

//define route to call the TeamController index method
Route::get('/team/list','TeamController@index');

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::get('/user/register', 'Auth\RegisterController@create');
// Route::get('/user/complete_enrollment', 'ProjectController@list');

Route::get('/user/complete_enrollment', function () {
	$items = array(
    	'prjectlist' =>  App\Project::get()
  	);
    return view('complete_enrollment',$items);
});

Route::post('/file/upload','HomeController@upload');

Route::post('/update-info','TeamController@create');

Route::get('/user/payment_details', function () {
  $team = App\Team::where('user_id',Auth::user()->id)->first();
  
    return view('payment_details',compact('team'));

});

Route::post('/update-payment-info','TeamController@update_payment');

Route::get('/update-payment-approval/{team}','TeamController@update_payment_status');

Route::get('/view/project_info', function () {
	$project =  array(
    	'project' =>  App\Team::where('user_id',Auth::user()->id)->with('project')->first()
  	);
    return view('project_info',$project);
});

Route::get('/team/details/{team_id}','TeamController@view');

Route::get('/user/view_payment_details', function () {
  $team = App\Team::where('user_id',Auth::user()->id)->first();
  
    return view('view_payment_details',compact('team'));

});

Route::get('/logout','Auth\LoginController@logout');

Route::get('/team/validate-name','TeamController@validate_name');

Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

Route::post('/import/mentors','MentorsController@importMentors');

// Route::get('/view/mentor_info', function () {
//   $mentors =  array(
//     'mentors' =>  App\Mentors::get()
//   );
//   return view('mentor_info',$mentors);
// });
Route::get('/view/mentor_info','MentorsController@index');