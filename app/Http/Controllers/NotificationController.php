<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function Read_one($id){
        DB::table('notifications')->where('id', $id)->update(['read_at' => now()]);
        return redirect()->back();
    }

    public function Read_all(){
        $user = Auth::guard('admin')->user();
    if($user->unreadNotifications){
        $user->notifications->markAsRead();
    }
    return redirect()->back();
    }

    public function delete_all(){
        $user = Auth::guard('admin')->user();
        if($user->notifications){
            foreach($user->notifications as $notification)
            $notification->delete();
        }
        return redirect()->back();
    }


}
