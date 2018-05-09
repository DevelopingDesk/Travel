<?php



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
//compnay

Route::get('create/compnay','CompanyController@create')->name('create.compnay');
Route::post('store/compnay','CompanyController@store')->name('store.compnay');
Route::get('delete/compnay/{id}','CompanyController@delete')->name('delete.compnay');
Route::post('edit/compnay','CompanyController@update')->name('edit.compnay');
//stock
Route::get('create/stock/{id}','StockController@create')->name('create.stock');
Route::post('create/stock','StockController@store')->name('store.stock');
Route::get('delete/stock/{id}','StockController@delete')->name('delete.stock');
//refund in stock
Route::get('refund/stock/{id}','StockController@refund')->name('refund.stock');

//check

Route::get('create/check/{id}','CheckController@create')->name('create.check');
Route::post('post/check/','CheckController@store')->name('store.check');
Route::post('edit/check','CheckController@update')->name('edit.check');
Route::get('delete/check/{id}','CheckController@delete')->name('delete.check');
//refund check
Route::get('refund/check/{id}','CheckController@refund')->name('refund.check');
Route::post('done/check','CheckController@approve')->name('approve.check');
//refund portal
Route::get('create/refund/{id}','RefundController@create')->name('refund.create');
Route::post('post/create/refund','RefundController@store')->name('refund.store');
Route::get('delete/create/refund/{id}','RefundController@delete')->name('refund.delete');

Route::post('done/refund','RefundController@approve')->name('approve.refund');

//reports 
Route::get('create/report/daily','ReportController@create')->name('daily.report');
Route::post('post/report/daily','ReportController@daily')->name('daily.reportview');
Route::post('ok/done/confirm','ReportController@ok')->name('ok.done');
//date wise report
Route::get('datewise/report','ReportController@dateWise')->name('datewise.report');

//ticket entry
Route::get('ticket/entry/form','StockController@entry')->name('ticket.entry');
Route::post('ticket/entry/form/post','StockController@postEntry')->name('ticket.entry.post');
