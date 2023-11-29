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

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Accounts;
use App\Http\Controllers\EstimateController;
use App\Http\Controllers\User;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\Label;

//PMS
use App\Http\Controllers\Work;





Route::get('/', [Accounts::class, 'Login']);
Route::get('/Login', [Accounts::class, 'Login']);
Route::get('/Logout', [Accounts::class, 'Logout']);
Route::post('/UserVerify', [Accounts::class, 'UserVerify']);



Route::group(['middleware' => ['CheckAdmin']], function () {


    Route::get('/Dashboard', [Accounts::class, 'Dashboard']);



    Route::get('/User', [User::class, 'Show']);
    Route::post('/UserSave', [User::class, 'UserSave']);
    Route::get('/UserEdit/{id}', [User::class, 'UserEdit']);
    Route::post('/UserUpdate/', [User::class, 'UserUpdate']);
    Route::get('/UserDelete/{id}', [User::class, 'UserDelete']);


    Route::get('/Lables', [Label::class, 'Show']);
    Route::post('/LabelSave', [Label::class, 'LabelSave']);
    Route::get('Lables/sticer_search', [Label::class, 'StickerSearch']);
    Route::get('Lables/sticker_print', [Label::class, 'StickerPrint']);
    Route::get('DeleteLabel/{id}', [Label::class, 'destroy']);

    //Route::get('/UserEdit/{id}',[User::class,'UserEdit']);
    //Route::post('/UserUpdate/',[User::class,'UserUpdate']);
    //Route::get('/UserDelete/{id}',[User::class,'UserDelete']);

    route::get('/UserProfile', [Accounts::class, 'UserProfile']);
    route::get('/ChangePassword', [Accounts::class, 'ChangePassword']);
    route::post('/UpdatePassword', [Accounts::class, 'UpdatePassword']);


    // ............Company............
    Route::get('/Company', [CompanyController::class, 'Company']);
    Route::post('/SaveCompany', [CompanyController::class, 'SaveCompany']);
    Route::get('/CompanyEdit/{id}', [CompanyController::class, 'CompanyEdit']);
    Route::post('/CompanyUpdate/', [CompanyController::class, 'CompanyUpdate']);
    Route::get('/CompanyDelete/{id}', [CompanyController::class, 'CompanyDelete']);


    Route::get('Backup', function () {

        /* php artisan migrate */
        \Artisan::call('database:backup');
        dd("Done");
    });




    Route::post('/DBDump/', [Accounts::class, 'DBDump']);
    Route::post('/Excel/', [Accounts::class, 'Excel']);

    //Projects
    Route::get('/Projects', [Work::class, 'Projects']);
    Route::get('/AddProject', [Work::class, 'AddProject']);
    Route::post('/SaveProject', [Work::class, 'SaveProject']);
    Route::get('/ProjectDelete/{id}', [Work::class, 'ProjectDelete']);
    Route::get('/ProjectEdit/{id}', [Work::class, 'ProjectEdit']);
    Route::post('/ProjectUpdate/', [Work::class, 'ProjectUpdate']);
    route::get('/ProjectView/{id}', [Work::class, 'ProjectView']);
    route::get('/ProjectViewPDF/{id}', [Work::class, 'EstimateViewPDF']);


    //Tasks
    Route::get('/Tasks', [Work::class, 'Tasks']);
    Route::get('/AddTask', [Work::class, 'AddTask']);
    Route::post('/SaveTask', [Work::class, 'SaveTask']);
    Route::get('/TaskDelete/{id}', [Work::class, 'TaskDelete']);
    Route::get('/TaskEdit/{id}', [Work::class, 'TaskEdit']);
    Route::post('/TaskUpdate/', [Work::class, 'TaskUpdate']);
    route::get('/TaskView/{id}', [Work::class, 'TaskView']);



    //Jobs
    Route::get('/JobList/{status?}', [JobController::class, 'index'])->name('jobs.list');
    Route::get('/AddJob', [JobController::class, 'create']);
    Route::post('/SaveJob', [JobController::class, 'store']);
    Route::post('/UpdateJobStatus', [JobController::class, 'updateJobStatus'])->name('job.updateStatus');
    Route::get('/ViewJob/{id}', [JobController::class, 'show'])->name('job.show');
    Route::get('DeleteJob/{id}', [JobController::class, 'destroy']);
    Route::get('/JobViewPDF/{id}', [JobController::class, 'jobViewPDF']);
    route::get('/JobEdit/{id}', [JobController::class, 'JobEdit']);
    route::post('/JobUpdate/', [JobController::class, 'JobUpdate']);



    // ..............Estimate.............
    route::get('/Estimate/', [EstimateController::class, 'Estimate']);

    route::get('/EstimateCreate/', [EstimateController::class, 'EstimateCreate']);

    route::post('/EstimateSave/', [EstimateController::class, 'EstimateSave']);
    route::get('/ajax_estimate/', [EstimateController::class, 'ajax_estimate']);

    route::get('/EstimateDelete/{id}', [EstimateController::class, 'EstimateDelete']);
    route::get('/EstimateView/{id}', [EstimateController::class, 'EstimateView']);
    route::get('/EstimateEdit/{id}', [EstimateController::class, 'EstimateEdit']);
    route::post('/EstimateUpdate/', [EstimateController::class, 'EstimateUpdate']);
    route::get('/BlankReport/', [Accounts::class, 'BlankReport']);
    route::get('/EstimateViewPDF/{id}', [EstimateController::class, 'EstimateViewPDF']);


    // ..............attachment iframe for all invoices ......
    route::get('/Attachment', [Accounts::class, 'Attachment']);
    Route::post('AttachmentSave', [Accounts::class, 'AttachmentSave']);
    Route::get('AttachmentDelete/{id}/{filename}', [Accounts::class, 'AttachmentDelete']);

    Route::get('AttachmentRead', [Accounts::class, 'AttachmentRead']);

    //Parties

    Route::get('/Parties', [Accounts::class, 'Parties']);
    Route::post('/SaveParties', [Accounts::class, 'SaveParties']);
    Route::get('/PartiesEdit/{id}', [Accounts::class, 'PartiesEdit']);
    Route::post('/PartiesUpdate/', [Accounts::class, 'PartiesUpdate']);
    Route::get('/PartiesDelete/{id}', [Accounts::class, 'PartiesDelete']);
});
// middleware end
