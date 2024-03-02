<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Http;

class FrontController extends Controller
{
    public function index(){

        $user_id=Auth::user()->id;
        $user_details=DB::table("user_details")->where("user_id",$user_id)->first();
        if($user_details){
         if($user_details->profileImage==null){
              $profile_image="placeholder.jpg";
         }else{
            $profile_image=$user_details->profileImage;
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
        $no_of_posts=DB::table("posts")->where("user_id",$user_id)->count();
    $no_of_followers =   DB::table("followers")->where("user_id",$user_id)->count("follower_id");
    $no_of_followings =   DB::table("followings")->where("user_id",$user_id)->count("follower_id");
        $data["profileimage"]=$profile_image;
        $data["job_title"]= $profile_job;
        $data["posts"]=$no_of_posts;
        $data["bio"]=$profile_bio;
        $data["followers"]=$no_of_followers;
        $data["followings"]=    $no_of_followings;
       $following_ids=DB::table("followings")->select("follower_id")->where("user_id",$user_id)->get();
       $follower_ids_array = $following_ids->pluck('follower_id')->toArray();
      // dd($follower_ids_array);
        $data["users_to_follow"] = DB::table("users")
        ->select("users.id as userid","users.name", DB::raw('IFNULL(user_details.job_title, "web developer") as job_title'), DB::raw('IFNULL(user_details.profileImage, "placeholder.jpg") as profileImage') )
        ->leftJoin("user_details", "user_details.user_id", "=", "users.id")
        ->where("users.id", "!=", $user_id)
        ->whereNotIn("users.id",$follower_ids_array)
        ->get();
        //https://newsapi.org/v2/everything?q=business&language=en&apiKey=678ef3c38bfd4689b825ca92dbfe9e6c
        //GET https://newsapi.org/v2/everything?q=apple&from=2024-02-29&to=2024-02-29&sortBy=popularity&apiKey=678ef3c38bfd4689b825ca92dbfe9e6c
        $today=date("Y-m-d");
      $from=date("Y-m-d",strtotime("-1 day"));
     $news=   Http::get("https://newsapi.org/v2/everything?q=business&pageSize=10&from=".$from."&to=".$today."&sortBy=popularity&apiKey=678ef3c38bfd4689b825ca92dbfe9e6c");
$news_data=$news->json();
unset($news_data["source"]);
unset($news_data["source"]);
//publishedAt
$news_data = json_decode(json_encode($news_data)); 
  $data["news"]=$news_data->articles;
//  dd(  $data["news"]);
   
        return view("index",$data);
    }
}
