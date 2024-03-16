<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use  DB;
use Auth;
class HeaderSocial extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $current_login_id=Auth::user()->id;
      $my_friend=DB::table('friendships')
      ->where("user_id",$current_login_id)
      ->where("friend_id","!=",$current_login_id)
      ->where("friend_ship_status",1)
      ->get();
      $my_friend_two=DB::table('friendships')
      ->where("friend_id",$current_login_id)
      ->where("user_id","!=",$current_login_id)
      ->where("friend_ship_status",1)
      ->get();
      $my_friend_id=$my_friend->pluck("friend_id")->toArray();
      $my_friend_id_two=$my_friend_two->pluck("user_id")->toArray();
     $my_friend_ids=array_unique(array_merge(  $my_friend_id));

      $data["my_friends"] = DB::table('users')
      ->select("name","profileImage","users.id")
      ->leftJoin("user_details","user_details.user_id","=","users.id")
      ->whereIn("users.id",$my_friend_ids)->get();
      $data["users_notifications"]=DB::table('users_notification')->where("user_id", $current_login_id)->get();
        return view('components.header-social',$data);
    }
}
