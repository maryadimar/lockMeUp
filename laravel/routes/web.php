<?php
use Carbon\Carbon;
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
    return view('hello');
});

Route::get('/vicon-self', function () {
    return view('data-vicon-self');
});

Route::get('/a', function () {
    return view('aa');
});

Auth::routes(['register' => false]);

Route::group(['middleware' => ['web', 'auth', 'roles']],function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::group(['roles'=>'Admin'],function(){
		#all data User
		Route::get('/admin/user', 'UserAdminController@index');
		Route::get('/admin/user/json','UserAdminController@data');
		Route::get('/admin/user/{id}/detailpwd','UserAdminController@detailcpwd');
		Route::get('/admin/user/{id}/detail','UserAdminController@detail');
		Route::get('/admin/user/{id}/nonactive','UserAdminController@nonActiveUser');
		Route::get('/admin/user/{id}/active','UserAdminController@ActiveUser');
		Route::post('/admin/add/user','UserAdminController@storage');
		Route::get('/admin/user/{id}/change-pwd','UserAdminController@changepwd');
		Route::post('/admin/user/{id}/change-pwd-ac','UserAdminController@changepwdsave');
		##profile admin
		Route::get('/admin/profile', 'AdminController@index');
		Route::post('/admin/password-changed', 'AdminController@changePassword');
		Route::post('/admin/profile-changed', 'AdminController@changeProfile');
		##
		#booking
		Route::get('/admin/create-booking', 'MeetController@create');
		Route::get('/admin/booking', 'MeetController@index');
		Route::get('/admin/booking/json','MeetController@json');
		Route::get('/admin/show/{id}/detail','MeetController@detail');
		Route::post('/admin/booking/save', 'MeetController@storage');
		Route::get('/admin/booking-delete/{id}/delete', 'MeetController@destroy');
		Route::get('/admin/booking-batal/{id}/batal', 'MeetController@batal');
		Route::get('/admin/booking-undo/{id}/undo', 'MeetController@undo');
		##
		## antrian
		Route::get('/admin/booking/antrian', 'MeetController@antrian');
		Route::get('/admin/booking/jsonantrian','MeetController@jsonantrian');
		Route::get('/admin/booking-approve/{id}/approve', 'MeetController@approve');
		## vicon
		Route::get('/admin/booking/create-vicon', 'MeetController@createvicon');
		Route::post('/admin/booking/save-vicon', 'MeetController@savevicon');
		Route::post('/admin/booking/save-vicon2', 'MeetController@savevicon2');
		Route::get('/admin/booking/vicon', 'MeetController@vicon');
		Route::get('/admin/booking/jsonvicon','MeetController@jsonvicon');
		Route::get('/admin/booking/{id}/detailvicon','MeetController@detailvicon');
		Route::post('/admin/booking/{id}/detailvicon/save-pic','MeetController@savepic');
		Route::get('/admin/booking/{id}/delete','MeetController@deletevicon');
		## vicon pribadi
		Route::get('/admin/booking/create-vicon-pribadi', 'ViconPribadiController@createviconpribadi');
		Route::get('/admin/booking/index-vicon-pribadi', 'ViconPribadiController@indexviconpribadi');
		Route::post('/admin/booking/save-vicon-pribadi', 'ViconPribadiController@saveviconpribadi');
		Route::post('/admin/booking/save-vicon-pribadi2', 'ViconPribadiController@saveviconpribadi2');
		Route::get('/admin/booking/{id}/detailvicon-pribadi','ViconPribadiController@detailviconpribadi');
		Route::post('/admin/booking/{id}/detailvicon/save-pic-pribadi','ViconPribadiController@savepic');
		Route::get('/admin/booking/{id}/delete-vicon-pribadi','ViconPribadiController@deleteviconpribadi');
		
	});

	Route::group(['roles'=>'Member'],function(){
		#all data User
		Route::get('/user/profile', 'UserController@index');
		Route::post('/user/password-changed', 'UserController@changePassword');
		#booking meeting
		Route::post('/user/booking/save', 'UserController@saveMeeting');
		Route::get('/user/booking-delete/{id}/delete', 'UserController@destroy');
		##search
		Route::get('/user/booking-search', 'UserController@search');
		Route::get('/user/booking-search-found', 'UserController@actSearch')->name('actSearch');
		#antrian
		Route::get('/user/antrian-meeting', 'UserController@antrian');
		#vicon
		Route::get('/user/form/{id}/vicon', 'UserController@formvicon');
		Route::post('/user/form/{id}/vicon/save', 'UserController@formviconsave');
		#ruangan
		Route::get('/user/ruangan', 'RuanganController@index');
		#vicon
		Route::get('/user/vicon', 'ViconController@index');
		Route::get('/user/vicon-create', 'ViconController@create');
		Route::post('/user/vicon-save', 'ViconController@store');
		Route::post('/user/vicon-save2', 'ViconController@store2');
		Route::get('/user/vicon/{id}/delete', 'ViconController@destroy');
		#vicon pribadi
		Route::get('/user/vicon-pribadi', 'ViconPribadiController@index');
		Route::get('/user/vicon-pribadi-create', 'ViconPribadiController@create');
		Route::post('/user/vicon-pribadi-save', 'ViconPribadiController@store');
		Route::post('/user/vicon-pribadi-save2', 'ViconPribadiController@store2');
		Route::get('/user/vicon-pribadi/{id}/delete', 'ViconPribadiController@destroy');
	});

	Route::group(['roles'=>'Super Admin'],function(){
		#all data User
		#master metting id
		Route::get('/sa/meetingid', 'MasterMeetingidController@index');
		Route::get('/sa/meetingid/json', 'MasterMeetingidController@json');
		Route::post('/sa/meetingid/save', 'MasterMeetingidController@store');
		Route::get('/sa/meetingid/{id}/delete', 'MasterMeetingidController@destroy');
		#master lantai
		Route::get('/sa/lantai', 'MasterLantaiController@index');
		#master bagian
		Route::get('/sa/bagian', 'MasterBagianController@index');
		Route::get('/sa/bagian/json', 'MasterBagianController@jsonindex');
		Route::post('/sa/bagian/save', 'MasterBagianController@store');
		Route::get('/sa/bagian/{id}/delete', 'MasterBagianController@destroy');
		# user admin
		Route::get('/sa/admin', 'UserSAController@index');
		Route::get('/sa/admin/json', 'UserSAController@json');
		Route::get('/sa/admin/{id}/detail', 'UserSAController@detail');
		Route::post('/sa/admin/save', 'UserSAController@store');
		Route::get('/sa/admin/{id}/change-pwd', 'UserSAController@changepwd');
		Route::post('/sa/admin/{id}/save-pwd', 'UserSAController@changepwdsave');
		Route::get('/sa/admin/{id}/nonactive','UserSAController@nonActiveUser');
		Route::get('/sa/admin/{id}/active','UserSAController@ActiveUser');
		#config
		Route::get('/sa/paginate/json', 'ConfigController@jsonPaginate');
		Route::get('/sa/paginate/index', 'ConfigController@jsonPaginate');

	});
});

Route::get('/see-all', 'LantaiController@all');
Route::get('/see-vicon-ruangan', 'LantaiController@viconRuangan');
Route::get('/see-vicon-pribadi', 'LantaiController@viconPribadi');
Route::get('/see-vicon', 'LantaiController@vicon');
Route::get('/jsee-vicon-pribadi', 'LantaiController@jsonvpribadi');

#lantai meeting
Route::get('/meeting/lt-aula', 'LantaiController@aula');
Route::get('/meeting/lt-2', 'LantaiController@lantai2');
Route::get('/meeting/lt-3', 'LantaiController@lantai3');

Route::get('/meeting/lt-4', 'LantaiController@lantai4');
Route::get('/meeting/lt-4-wawancara-I', 'LantaiController@wawancaraI');
Route::get('/meeting/lt-4-wawancara-II', 'LantaiController@wawancaraII');

Route::get('/meeting/lt-4/{id}/detail', 'LantaiController@detail4');

/*Route::get('/meeting/lt-5', 'LantaiController@lantai5');
Route::get('/meeting/lt-5/{id}/detail', 'LantaiController@detail5');*/

Route::get('/meeting/lt-8-A', 'LantaiController@lantai8a');
Route::get('/meeting/lt-8-B', 'LantaiController@lantai8b');
Route::get('/meeting/lt-8-CLF', 'LantaiController@lantai8clf');

Route::get('/meeting/lt-9', 'LantaiController@lantai9');

Route::get('/meeting/lt-10-A', 'LantaiController@lantai10a');
Route::get('/meeting/lt-10-B', 'LantaiController@lantai10b');
Route::get('/meeting/lt-10-C', 'LantaiController@lantai10c');

#lantai vicon
Route::get('/vicon/lt-aula', 'LantaiController@vaula');
Route::get('/vicon/lt-2', 'LantaiController@vlantai2');
Route::get('/vicon/lt-3', 'LantaiController@vlantai3');

Route::get('/vicon/lt-4', 'LantaiController@vlantai4');
Route::get('/vicon/lt-4-wawancara-I', 'LantaiController@vwawancaraI');
Route::get('/vicon/lt-4-wawancara-II', 'LantaiController@vwawancaraII');

Route::get('/vicon/lt-8-A', 'LantaiController@vlantai8a');
Route::get('/vicon/lt-8-B', 'LantaiController@vlantai8b');
Route::get('/vicon/lt-8-CLF', 'LantaiController@vlantai8clf');

Route::get('/vicon/lt-9', 'LantaiController@vlantai9');

Route::get('/vicon/lt-10-A', 'LantaiController@vlantai10a');
Route::get('/vicon/lt-10-B', 'LantaiController@vlantai10b');
Route::get('/vicon/lt-10-C', 'LantaiController@vlantai10c');
