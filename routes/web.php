<?php

use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;


Route::view('/','welcome')->name('home');
Route::view('admin/admin','admin')->name('admin')->middleware('auth:admin');
Route::view('user','user')->name('user')->middleware('auth');


Route::get('/readnotifications{id}',[NotificationController::class,'Read_one'])->name('read');
Route::post('/markAllAsRead', [NotificationController::class,'Read_all'])->name('markAllAsRead');
Route::post('/deleteAllNotifications',[NotificationController::class, 'delete_all'])->name('deleteAllNotifications');