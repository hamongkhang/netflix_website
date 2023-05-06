<?php

use Illuminate\Routing\RouteGroup;
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

//Admin routes

Route::group(['prefix' => 'admin1'], function () {

    //Admin login, index ,logout
    Route::get('/', 'AdminController@checkLogin');
    Route::get('index', 'AdminController@index')->name('admin.index')->middleware('AdminMiddleware');
    Route::get('login', 'AdminController@getLogin')->name('admin.getLogin');
    Route::post('login', 'AdminController@postLogin')->name('admin.postLogin');
    Route::get('logout', 'AdminController@logout')->name('admin.logout');

    //Admin manage cate

    Route::group(['prefix' => 'cate', 'middleware' => 'AdminMiddleware'], function () {
        Route::get('add', 'CateController@create')->name('admin.cate.create');
        Route::post('add', 'CateController@store')->name('admin.cate.store');
        Route::get('list', 'CateController@index')->name('admin.cate.list');
        Route::get('del/{id}', 'CateController@destroy')->name('admin.cate.del');
        Route::get('edit/{id}', 'CateController@edit')->name('admin.cate.edit');
        Route::post('edit/{id}', 'CateController@update')->name('admin.cate.update');
    });

    //Admin manage nation

    Route::group(['prefix' => 'nation', 'middleware' => 'AdminMiddleware'], function () {
        Route::get('add', 'NationController@create')->name('admin.nation.create');
        Route::post('add', 'NationController@store')->name('admin.nation.store');
        Route::get('list', 'NationController@index')->name('admin.nation.list');
        Route::get('del/{id}', 'NationController@destroy')->name('admin.nation.del');
        Route::get('edit/{id}', 'NationController@edit')->name('admin.nation.edit');
        Route::post('edit/{id}', 'NationController@update')->name('admin.nation.update');
    });

    //Admin manage year

    Route::group(['prefix' => 'year', 'middleware' => 'AdminMiddleware'], function () {
        Route::get('add', 'YearController@create')->name('admin.year.create');
        Route::post('add', 'YearController@store')->name('admin.year.store');
        Route::get('list', 'YearController@index')->name('admin.year.list');
        Route::get('del/{id}', 'YearController@destroy')->name('admin.year.del');
        Route::get('edit/{id}', 'YearController@edit')->name('admin.year.edit');
        Route::post('edit/{id}', 'YearController@update')->name('admin.year.update');
    });

    //Admin manage movie

    Route::group(['prefix' => 'movie', 'middleware' => 'AdminMiddleware'], function () {
        Route::get('add', 'MovieController@create')->name('admin.movie.create');
        Route::post('add', 'MovieController@store')->name('admin.movie.store');
        Route::get('list', 'MovieController@index')->name('admin.movie.list');
        Route::get('del/{id}', 'MovieController@destroy')->name('admin.movie.del');
        Route::get('edit/{id}', 'MovieController@edit')->name('admin.movie.edit');
        Route::post('edit/{id}', 'MovieController@update')->name('admin.movie.update');

        Route::get('series', 'MovieController@getadminseries')->name('admin.movie.series');
        Route::get('addSeries', 'MovieController@createSeries')->name('admin.movie.createSeries');
        Route::post('addSeries', 'MovieController@storeSeries')->name('admin.movie.storeSeries');
    });

    //Admin manage user

    Route::group(['prefix' => 'user', 'middleware' => 'AdminMiddleware'], function () {
        Route::get('add', 'UserController@create')->name('admin.user.create');
        Route::post('add', 'UserController@store')->name('admin.user.store');
        Route::get('list', 'UserController@index')->name('admin.user.list');
        Route::get('del/{id}', 'UserController@destroy')->name('admin.user.del');
        Route::get('edit/{id}', 'UserController@edit')->name('admin.user.edit');
        Route::post('edit/{id}', 'UserController@update')->name('admin.user.update');
    });

    //Admin manage cabinet

    Route::group(['prefix' => 'cabinet', 'middleware' => 'AdminMiddleware'], function () {
        Route::get('list', 'CabinetController@index')->name('admin.cabinet.list');
        Route::get('del/{id}', 'CabinetController@destroy')->name('admin.cabinet.del');
    });

    //Admin manage comment

    Route::group(['prefix' => 'comment', 'middleware' => 'AdminMiddleware'], function () {
        Route::get('list', 'CommentController@index')->name('admin.comment.list');
        Route::get('del/{id}', 'CommentController@adminDelComment')->name('admin.comment.del');
    });

    //Admin manage charge wallet

    Route::group(['prefix' => 'wallet', 'middleware' => 'AdminMiddleware'], function () {
        Route::get('list', 'WalletController@walletCharge')->name('admin.walletCharge.list');
    });

    //Admin manage payment

    Route::group(['prefix' => 'payment', 'middleware' => 'AdminMiddleware'], function () {
        Route::get('list', 'PaymentController@paymentList')->name('admin.payment.list');
    });

    //Admin manage statistic

    Route::group(['prefix' => 'statistic', 'middleware' => 'AdminMiddleware'], function () {
        Route::get('payment', 'AdminController@statisticPayment')->name('admin.statistic.payment');
        Route::post('payment', 'AdminController@sortPayment')->name('admin.statistic.sort_payment');
        Route::get('charge', 'AdminController@statisticCharge')->name('admin.statistic.charge');
        Route::post('charge', 'AdminController@sortCharge')->name('admin.statistic.sort_charge');
    });
});

//User routes
///Home

Route::get('', 'HomeController@index')->name('user.index');
Route::get('about', 'HomeController@about')->name('user.about');

///Movie

Route::group(['prefix' => 'movie'], function () {
    Route::get('detail/{id}', 'MovieController@detailmovie')->name('user.movie');
    Route::get('watch/{id}/{server}', 'MovieController@watchmovie')->name('user.movie.watch');
});
Route::get('list', 'MovieController@getlist')->name('user.list');
Route::get('trailer', 'MovieController@gettrailer')->name('user.trailer');
Route::get('series', 'MovieController@getseries')->name('user.series');
Route::get('search', 'MovieController@getSearch');
Route::get('getHint/{q}', 'MovieController@getHint')->name('user.getHint');
Route::post('search', 'MovieController@postSearch')->name('user.search');
Route::get('bought', 'MovieController@getBoughtMovie')->name('user.boughtMovie')->middleware('UserMiddleware');

///Cate

Route::get('cate/{id}', 'CateController@getcate')->name('user.cate');

///Nation

Route::get('nation/{id}', 'NationController@getnation')->name('user.nation');

///Year

Route::get('year/{id}', 'YearController@getyear')->name('user.year');

///User action - login - logout - sign up - profile

Route::get('login', 'UserController@getlogin');
Route::post('login', 'UserController@loginuser')->name('user.postlogin');
Route::get('logout', 'UserController@logoutuser')->name('user.logout')->middleware('UserMiddleware');
Route::get('signup', 'UserController@getsignup');
Route::post('signup', 'UserController@signupuser')->name('user.signup');
Route::get('profile', 'UserController@getProfile')->name('user.getProfile')->middleware('UserMiddleware')->middleware('UserMiddleware');
Route::post('profile', 'UserController@postProfile')->name('user.postProfile')->middleware('UserMiddleware')->middleware('UserMiddleware');
Route::get('history', 'UserController@historyPayment')->name('user.historyPayment')->middleware('UserMiddleware')->middleware('UserMiddleware');


///Recover password

Route::get('recoverpassword', 'Auth\ForgotPasswordController@getrecoverpassword')->name('user.getrecoverpassword');
Route::post('recoverpassword', 'Auth\ForgotPasswordController@postrecoverpassword')->name('user.postrecoverpassword');
Route::get('checkrecover/{token}', 'Auth\ForgotPasswordController@checkrecover')->name('user.checkrecover');
Route::post('checkrecover/{token}', 'Auth\ForgotPasswordController@postRecoverNewPassword')->name('user.postRecoverNewPassword');

///Cabinet

Route::get('cabinet', 'CabinetController@getCabinet')->name('user.getCabinet')->middleware('UserMiddleware');
Route::get('addCabinet/{username}/{movie_id}', 'CabinetController@addCabinet')->name('user.addCabinet')->middleware('UserMiddleware');
Route::get('deleteCabinet/{username}/{movie_id}', 'CabinetController@deleteCabinet')->name('user.deleteCabinet')->middleware('UserMiddleware');

///Comment

Route::post('comment/{movie_id}', 'CommentController@postComment')->name('user.postComment');
Route::post('editComment/{comment_id}', 'CommentController@editComment')->name('user.editComment');
Route::get('delComment/{comment_id}', 'CommentController@delComment')->name('user.delComment');

//Rate
Route::post('rate/{movie_id}/{user_id}', 'RateController@postRate')->name('user.postRate');

///Wallet

Route::group(['prefix' => 'wallet', 'middleware' => 'UserMiddleware'], function () {
    Route::get('/', 'WalletController@getWallet')->name('user.getWallet');
    Route::get('charge', 'WalletController@getChargeWallet')->name('user.getChargeWallet');
    Route::post('charge', 'WalletController@postChargeWallet')->name('user.postChargeWallet');
    Route::get('saveChargeWallet/{username}', 'WalletController@saveChargeWallet')->name('user.saveChargeWallet');
});

///Buy movie

Route::group(['prefix' => 'payment', 'middleware' => 'UserMiddleware'], function () {
    Route::get('buy/{movie_id}', 'PaymentController@buyMovie')->name('user.buyMovie');
});

///Reject All

Route::get('{all?}', function () {
    return redirect()->route('user.index')->with(['thongbao_level' => 'danger', 'thongbao' => "<b>Trang bạn vừa truy cập không tồn tại!</b>"]);
});
