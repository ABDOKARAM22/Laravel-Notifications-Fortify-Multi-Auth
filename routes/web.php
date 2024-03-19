<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('admin/admin','admin')->name('admin')->middleware('auth:admin');
Route::view('user','user')->name('user')->middleware('auth');

Route::get('/readnotifications{id}',function($id){
    DB::table('notifications')->update(['read_at'=>now()]);
    return redirect()->back();
})->name('read');

Route::post('/markAllAsRead', function(){
    $user = Auth::guard('admin')->user();
    if($user->unreadNotifications){
        $user->notifications->markAsRead();
    }
    return redirect()->back();
})->name('markAllAsRead');

Route::post('/deleteAllNotifications', function(){
    $user = Auth::guard('admin')->user();
    if($user->notifications){
        foreach($user->notifications as $notification)
        $notification->delete();
    }
    return redirect()->back();
})->name('deleteAllNotifications');
