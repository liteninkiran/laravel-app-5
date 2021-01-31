<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\CompanyFiltersController;

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

Route::get('/', function ()
{
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get   ('/company'               , [CompaniesController::class, 'index'  ])->name('company.index'  );
Route::get   ('/company/create'        , [CompaniesController::class, 'create' ])->name('company.create' );
Route::post  ('/company'               , [CompaniesController::class, 'store'  ])->name('company.store'  );
Route::get   ('/company/{company}'     , [CompaniesController::class, 'show'   ])->name('company.show'   );
Route::get   ('/company/{company}/edit', [CompaniesController::class, 'edit'   ])->name('company.edit'   );
Route::put   ('/company/{company}'     , [CompaniesController::class, 'update' ])->name('company.update' );
Route::delete('/company/{company}'     , [CompaniesController::class, 'destroy'])->name('company.destroy');

Route::post  ('/company/filter'        , [CompanyFiltersController::class, 'index'])->name('companyFilter.index');

/*
    Verb        Path                    Action      Route Name
    ----------------------------------------------------------------
    GET         /photo                  index       photo.index
    GET         /photo/create           create      photo.create
    POST        /photo                  store       photo.store
    GET         /photo/{photo}          show        photo.show
    GET         /photo/{photo}/edit     edit        photo.edit
    PUT/PATCH   /photo/{photo}          update      photo.update
    DELETE      /photo/{photo}          destroy     photo.destroy
*/

