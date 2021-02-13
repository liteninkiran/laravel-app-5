<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\CompanyFiltersController;
use App\Http\Controllers\RecruitersController;

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

// Company
Route::get   ('/company'               , [CompaniesController::class, 'index'  ])->name('company.index'  );
Route::get   ('/company/create'        , [CompaniesController::class, 'create' ])->name('company.create' )->middleware('can:isAdmin');
Route::post  ('/company'               , [CompaniesController::class, 'store'  ])->name('company.store'  )->middleware('can:isAdmin');
Route::get   ('/company/{company}'     , [CompaniesController::class, 'show'   ])->name('company.show'   );
Route::get   ('/company/{company}/edit', [CompaniesController::class, 'edit'   ])->name('company.edit'   )->middleware('can:isAdmin');
Route::put   ('/company/{company}'     , [CompaniesController::class, 'update' ])->name('company.update' )->middleware('can:isAdmin');
Route::delete('/company/{company}'     , [CompaniesController::class, 'destroy'])->name('company.destroy')->middleware('can:isAdmin');

Route::post  ('/company/filter'        , [CompanyFiltersController::class, 'index'])->name('companyFilter.index');

// Recruiter
Route::get   ('/recruiter'                 , [RecruitersController::class, 'index'  ])->name('recruiter.index'  );
Route::get   ('/recruiter/create'          , [RecruitersController::class, 'create' ])->name('recruiter.create' )->middleware('can:isAdmin');
Route::post  ('/recruiter'                 , [RecruitersController::class, 'store'  ])->name('recruiter.store'  )->middleware('can:isAdmin');
Route::get   ('/recruiter/{recruiter}'     , [RecruitersController::class, 'show'   ])->name('recruiter.show'   );
Route::get   ('/recruiter/{recruiter}/edit', [RecruitersController::class, 'edit'   ])->name('recruiter.edit'   )->middleware('can:isAdmin');
Route::put   ('/recruiter/{recruiter}'     , [RecruitersController::class, 'update' ])->name('recruiter.update' )->middleware('can:isAdmin');
Route::delete('/recruiter/{recruiter}'     , [RecruitersController::class, 'destroy'])->name('recruiter.destroy')->middleware('can:isAdmin');

Route::post  ('/recruiter/filter'          , [RecruitersFiltersController::class, 'index'])->name('recruiterFilter.index');

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

