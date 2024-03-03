<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Http;
use App\Models\User;
use App\Models\Post;
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
        $following_ids=DB::table("followings")->select("follower_id")->where("user_id",$user_id)->get();
        $follower_ids_array = $following_ids->pluck('follower_id')->toArray();
       $no_of_posts=DB::table("posts")->where("user_id",$user_id)->count();
    $no_of_followers =   DB::table("followers")->where("user_id",$user_id)->count("follower_id");
    $no_of_followings =   DB::table("followings")->where("user_id",$user_id)->count("follower_id");
    $friends=DB::table('friendships')->where("user_id",$user_id)->get();
  $friend_id = $friends->pluck('friend_id')->toArray();
  $user_pages=DB::table('social_page_followers')->where("user_id",$user_id)->get();
   //  dd($user_pages);
  $page_id = $user_pages->pluck('social_page_id')->toArray();
   //  dd($page_id);
   $user_ids=[];
   $post_user_ids=array_merge($friend_id,$follower_ids_array);
   $post_user_ids=array_unique($post_user_ids);
  $user_posts = Post::withCount(['likes',"comments"])
  ->with(["user","comments"=>function($query){
    $query->select("comments.user_id","comments.post_id","comments.comment_content","users.name","comments.created_at");
    $query->join("users","users.id","=","comments.user_id");
  },"social_page","likes"=>function($query)
  {
    $query->select("likes.user_id","likes.post_id","users.name");
    $query->join("users","users.id","=","likes.user_id");
  }
  ])
    
  ->whereIn("posts.user_id",$post_user_ids)
   ->orwhere("posts.user_id",$user_id)
  // ->orwhereIn("social_page_id",$page_id)
  ->get();


  $user_posts_page = Post::withCount(['likes'])
  ->with(["social_page","likes"=>function($query)
  {
    $query->select("likes.user_id","likes.post_id","users.name");
    $query->join("users","users.id","=","likes.user_id");
  }
  ])
    
  ->whereIn("social_page_id",$page_id)
 
  // ->whereIn("social_page_id",$page_id)
  ->get();
  // dd($user_posts_page);
       // dd($posts);
   // dd($friend_id);
$user_ids=[];


$user_ids=array_unique($user_ids);
//dd($user_ids);


    $frineds_my=DB::table('friendships')->where("user_id",$user_id)->get();
    $my_friend_id =  $frineds_my->pluck('friend_id')->toArray();
   
 
    $frineds_my_friends=DB::table('friendships')->whereIn("user_id",  $my_friend_id )->get();
    $my_friend_fr_id =  $frineds_my_friends->pluck('friend_id')->toArray();

// Get the user's friends and their mutual friends

    $myfriend_fr=User::whereIn("users.id",   $my_friend_fr_id)
    ->whereNotIn("users.id",$my_friend_id)
    ->withCount("mutualFriends")
    
    ->get();
    
     // dd(  $myfriend_fr->toArray());
// Loop through each friend and their mutual friends


   //  dd();
        $data["profileimage"]=$profile_image;
        $data["job_title"]= $profile_job;
        $data["posts"]=$no_of_posts;
        $data["user_posts"]=$user_posts;
        $data["bio"]=$profile_bio;
        $data["followers"]=$no_of_followers;
        $data["followings"]=$no_of_followings;
        $data["user_posts"]=$user_posts;
        $data["user_pages_posts"]=$user_posts_page;
        $data["to_be_friends"]=   $myfriend_fr;
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
     $news=   Http::get("https://newsapi.org/v2/everything?q=business&pageSize=10&from=".$from."&to=".$today."&sortBy=publishedAt&apiKey=678ef3c38bfd4689b825ca92dbfe9e6c");
$news_data=$news->json();
unset($news_data["source"]);
unset($news_data["source"]);
//publishedAt
$news_data = json_decode(json_encode($news_data)); 
  $data["news"]=$news_data->articles;
  /*
    foreach($user_posts as $user_post){
        echo "post_id ".$user_post->id."<br>";
        echo "likes:". $user_post->likes_count."<br>";
        echo "comments:".$user_post->comments_count."<br>";

       if($user_post->user_id!=null){
        echo "auther_name:". $user_post->user->name."<br>";
    
            if($user_post->user->user_detail!=null){
              if(count($user_post->user->user_detail)>0){
        echo "author_User_job:".$user_post->user->user_detail[0]->job_title."<br>";
              }
            }
       }
       if($user_post->social_page_id!=null){
        echo "page_name:". $user_post->social_page->page_name."<br>";
       }
       echo "post:"."<br>". $postContent=$user_post->content."<br>";
         if($user_post->comments_count > 0){
            echo "comments <br>";
            foreach($user_post->comments as $comment){
                   echo "comment_id:".$comment->id."</br>";
                   echo "comment:".$comment->comment_content."</br>";
                   echo "comment_user:".$comment->name."</br>";
            }

         }
      
    }
    */
//dd($data);
//  dd(  $data["news"]);
   
        return view("index",$data);
    }
}
