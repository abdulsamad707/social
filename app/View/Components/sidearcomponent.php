<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use DB;
use Auth;
class sidearcomponent extends Component
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
        $user_id=Auth::user()->id;
        $no_of_followers =   DB::table("followers")->where("user_id",$user_id)->count("follower_id");
        $no_of_followings =   DB::table("followings")->where("user_id",$user_id)->count("follower_id");
        $no_of_posts=DB::table("posts")->where("user_id",$user_id)->count();
        $user_details=DB::table("user_details")->where("user_id",$user_id)->first();
        
        if($user_details){
         if($user_details->profileImage==null){
              $profile_image="placeholder.jpg";
         }else{
            $profile_image=$user_details->profileImage;
         }
         if(Auth::user()->cover_photo==null){
            $coverPhoto="placeholder.jpg";
       }else{
         $coverPhoto=asset('assets/images/coverphoto/'.Auth::user()->name.'/'.Auth::user()->cover_photo);
       }
         if($user_details->job_title==null){
            $profile_job="Web Developer";
       }else{
          $profile_job=$user_details->job_title;
       }
       if($user_details->bio==null){
        $profile_bio="I am Web Developer";
   }else{
      $profile_bio=$user_details->bio;
   }
        }else{
            $profile_image="placeholder.jpg";
            $profile_job=null;
            $profile_bio=null;
        }
        $data["coverphoto"]=asset("assets/images/coverphoto/".Auth::user()->name."/".Auth::user()->cover_photo);
        $data["profileimage"]=$profile_image;
        $data["job_title"]= $profile_job;
        $data["bio"]=$profile_bio;
        $data["posts"]=$no_of_posts;
        $data["followers"]=$no_of_followers;
        $data["followings"]=$no_of_followings;
    
        return view('components.sidearcomponent',$data);
    }
}
