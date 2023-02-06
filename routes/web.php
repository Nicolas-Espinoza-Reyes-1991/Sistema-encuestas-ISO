<?php

use Illuminate\Support\Facades\Route;
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
    return view('login.index');
});
Route::get('/nacionalResult', 'NacionalController@index')->name('/nacionalResult');
Route::post('/contenFormTokenResult', 'NacionalController@contenFormTokenResult')->name('/contenFormTokenResult');
Route::post('/validateTokenUserNacional', 'NacionalController@validateTokenUserNacional')->name('/validateTokenUserNacional');
Route::get('/reportNacional/{token}', 'NacionalController@reportNacional')->name('/reportNacional');
Route::get('/homePolls/{token}', 'HomeController@homePolls')->name('/homePolls');
Route::post('/form_content', 'HomeController@form_content')->name('/form_content');
Route::get('/character/{token}', 'CharacterController@character')->name('/character');
Route::post('/validateTokenUser', 'CharacterController@validateTokenUser')->name('/validateTokenUser');
Route::post('/contenFormToken', 'CharacterController@contenFormToken')->name('/contenFormToken');
Route::post('/guardarEditarCharacter', 'CharacterController@guardarEditarCharacter')->name('/guardarEditarCharacter');
Route::post('/guardarEditarProfesional', 'CharacterController@guardarEditarProfesional')->name('/guardarEditarProfesional');
Route::post('/contenFormCharacter', 'CharacterController@contenFormCharacter')->name('/contenFormCharacter');
Route::post('/contenFormProfesional', 'CharacterController@contenFormProfesional')->name('/contenFormProfesional');
Route::post('/contenTableProfesional', 'CharacterController@contenTableProfesional')->name('/contenTableProfesional');
Route::post('/deleteProfesional', 'CharacterController@deleteProfesional')->name('/deleteProfesional');


// -----------------------------------encuestas de riesgo---------------------------------
Route::get('/poll_body/{token}', 'PollsController@poll_body')->name('/poll_body');
Route::post('/contenFormPoll', 'PollsController@contenFormPoll')->name('/contenFormPoll');
Route::post('/guardarEditarpolls', 'PollsController@guardarEditarpolls')->name('/guardarEditarpolls');

Route::get('/poll_body2/{token}', 'PollsController2@poll_body')->name('/poll_body2');
Route::post('/contenFormPoll2', 'PollsController2@contenFormPoll')->name('/contenFormPoll2');
Route::post('/guardarEditarpolls2', 'PollsController2@guardarEditarpolls')->name('/guardarEditarpolls2');

Route::get('/poll_body3/{token}', 'PollsController3@poll_body')->name('/poll_body3');
Route::post('/contenFormPoll3', 'PollsController3@contenFormPoll')->name('/contenFormPoll3');
Route::post('/guardarEditarpolls3', 'PollsController3@guardarEditarpolls')->name('/guardarEditarpolls3');

Route::get('/poll_body4/{token}', 'PollsController4@poll_body')->name('/poll_body4');
Route::post('/contenFormPoll4', 'PollsController4@contenFormPoll')->name('/contenFormPoll4');
Route::post('/guardarEditarpolls4', 'PollsController4@guardarEditarpolls')->name('/guardarEditarpolls4');
// -----------------------------------encuestas ISO---------------------------------
Route::get('/isoPoll1_body/{token}', 'IsoPollsController1@isoPoll1_body')->name('/isoPoll1_body');
Route::post('/contenFormIsoPoll1', 'IsoPollsController1@contenFormIsoPoll1')->name('/contenFormIsoPoll1');
Route::post('/guardarEditarIsopolls1', 'IsoPollsController1@guardarEditarIsopolls1')->name('/guardarEditarIsopolls1');

Route::get('/isoPoll2_body/{token}', 'IsoPollsController2@isoPoll2_body')->name('/isoPoll2_body');
Route::post('/contenFormIsoPoll2', 'IsoPollsController2@contenFormIsoPoll2')->name('/contenFormIsoPoll2');
Route::post('/guardarEditarIsopolls2', 'IsoPollsController2@guardarEditarIsopolls2')->name('/guardarEditarIsopolls2');

Route::get('/isoPoll3_body/{token}', 'IsoPollsController3@isoPoll3_body')->name('/isoPoll3_body');
Route::post('/contenFormIsoPoll3', 'IsoPollsController3@contenFormIsoPoll3')->name('/contenFormIsoPoll3');
Route::post('/guardarEditarIsopolls3', 'IsoPollsController3@guardarEditarIsopolls3')->name('/guardarEditarIsopolls3');

Route::get('/isoPoll4_body/{token}', 'IsoPollsController4@isoPoll4_body')->name('/isoPoll4_body');
Route::post('/contenFormIsoPoll4', 'IsoPollsController4@contenFormIsoPoll4')->name('/contenFormIsoPoll4');
Route::post('/guardarEditarIsopolls4', 'IsoPollsController4@guardarEditarIsopolls4')->name('/guardarEditarIsopolls4');
// -----------------------------------graficos ISO---------------------------------
Route::get('/graficos_iso/{token}/{number_graf}', 'IsoGraficoController@index')->name('/graficos_iso');
Route::post('/bodyGrafIso', 'IsoGraficoController@bodyGrafIso')->name('/bodyGrafIso');




Route::get('/result/{token}', 'ResultController@result')->name('/result');
Route::post('/graficos', 'ResultController@graficos')->name('/graficos');
Route::post('/modalGraficoDimension', 'ResultController@modalGraficoDimension')->name('/modalGraficoDimension');
Route::post('/modalGraficoDimensionDownload', 'ResultController@modalGraficoDimensionDownload')->name('/modalGraficoDimensionDownload');
Route::get('/download', 'PdfController@download')->name('/download');

Route::get('/excel/{tipo_reporte}/{token}', 'ReportController@excel')->name('/excel');


Route::get('/close', function () {
    return view('close.index');
});

