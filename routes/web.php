<?php

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//index
Route::get('/', function () {
    return view('user.index');
})->name('index');

// company login
Route::post('/company' ,[CompanyController::class,'getCompany'])->name('getCompany');

//company-votes
Route::get('/vote/{company}' , [VoteController::class ,'create'])->name('create.vote');


//admin-auth
Auth::routes();
Route::get('/create/user' , [UserController::class ,'create'])->name('create.user');
Route::post('/store/user' , [UserController::class ,'store'])->name('store.user');
Route::get('/users' , [UserController::class ,'index'])->name('users');
Route::get('/user/delete/{user}' , [UserController::class ,'destroy'])->name('delete.user');
Route::get('/user/edit/{user}' , [UserController::class ,'edit'])->name('edit.user');



// check company



//admin
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// meetings
Route::get('/meeting/create' , [MeetingController::class ,'create'])->name('create.meeting')->middleware('auth');;
Route::post('/meeting/store' , [MeetingController::class ,'store'])->name('store.meeting')->middleware('auth');;
Route::get('/meeting/show/{meeting}' , [MeetingController::class ,'show'])->name('show.meeting')->middleware('auth');;
Route::get('/meetings' , [MeetingController::class ,'index'])->name('meetings')->middleware('auth');;
Route::get('/meeting/edit/{meeting}' , [MeetingController::class ,'edit'])->name('edit.meeting')->middleware('auth');;
Route::post('/meetings/update/{meeting}' , [MeetingController::class ,'update'])->name('update.meeting')->middleware('auth');;
Route::get('/meetings/delete/{meeting}' , [MeetingController::class ,'destroy'])->name('delete.meeting')->middleware('auth');;

//attachments
Route::get('/attachment/edit/{attachment}' , [AttachmentController::class ,'edit'])->name('attachment.edit')->middleware('auth');;
Route::get('/attachments/{meeting}' , [AttachmentController::class ,'index'])->name('attachments')->middleware('auth');;
Route::get('/attachments/create/{meeting}' , [AttachmentController::class ,'create'])->name('attachment.create')->middleware('auth');;
Route::post('/attachment/store/{meeting}' , [AttachmentController::class ,'store'])->name('attachment.store')->middleware('auth');;
Route::delete('//attachment/delete/{attachment}' , [AttachmentController::class ,'destroy'])->name('attachment.delete')->middleware('auth');;
Route::post('/attachment/update/{attachment}' , [AttachmentController::class ,'update'])->name('attachment.update')->middleware('auth');;

Route::post('/verify/message/{company}' , [CompanyController::class ,'verifyMsg'])->name('verifyMessage');


// meeting--attendance
Route::post('/company/attendance/{company}' , [CompanyController::class ,'attendance'])->name('company.attendance');



Route::get('/votes/{company}/{meeting}', [App\Http\Controllers\VoteController::class, 'create'])->name('votes');
Route::post('/store/vote', [App\Http\Controllers\VoteController::class, 'store'])->name('store.vote');
Route::get('/download/{file}', [App\Http\Controllers\AttachmentController::class, 'download'])->name('download');


Route::get('/get_votes/{meeting}', [App\Http\Controllers\MeetingController::class, 'get_votes'])->name('vote.meeting')->middleware('auth');;

Route::get('/company/get/', [App\Http\Controllers\CompanyController::class, 'get'])->name('company.get')->middleware('auth');;
Route::get('/company/show', [App\Http\Controllers\CompanyController::class, 'show'])->name('company.show')->middleware('auth');;
















