<?php

namespace App\Http\Controllers;
use App\Events\NotificationUser;
use Illuminate\Http\Request;
use Auth;
use DB;
use Http;
use Hash;
use App\Models\User;
use App\Models\Post;
use App\Models\social_chat;
use Illuminate\Support\Facades\Cache;
use App\Events\UserMessage;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\File;
use App\Models\user_noftifictaion;
class FrontController extends Controller
{

public function change_password(Request $req){
     $pasword= $req->post('password');
    $pasword=Hash::make($pasword);
    DB::table('users')->where("id",Auth::user()->id)->update([
      "password"=>  $pasword
    ]);
    return back()->with('success', 'Settings updated successfully');

    
}

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
  $friends_two=DB::table('friendships')->where("friend_id",$user_id)->get();
  $friend_id_two = $friends_two->pluck('user_id')->toArray();

  $user_pages=DB::table('social_page_followers')->where("user_id",$user_id)->get();
   //  dd($user_pages);
  $page_id = $user_pages->pluck('social_page_id')->toArray();
   //  dd($page_id);
   $user_ids=[];
   $post_user_ids=array_merge($friend_id,$follower_ids_array,$friend_id_two);
   $post_user_ids=array_unique($post_user_ids);

    //  dd( $post_user_ids);t
  $user_posts = Post::withCount(['likes',"comments"])
  ->with(["user","comments"=>function($query){
    $query->select( "user_details.profileImage","comments.user_id","comments.post_id","comments.comment_content","users.name","comments.created_at");
    $query->join("users","users.id","=","comments.user_id");
    $query->leftJoin("user_details","user_details.user_id","=","comments.user_id");
  },"social_page","likes"=>function($query)
  {
    $query->select("likes.user_id","likes.post_id","users.name");
    $query->join("users","users.id","=","likes.user_id");
  }
  ])
  
  ->whereIn("posts.user_id",$post_user_ids)
  ->orWhere("posts.user_id",$user_id)
  ->orderBy("created_at","desc")
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

$my_friends=DB::table('friendships')->
where("user_id",$user_id)

->get();
$my_friend_id=$my_friends->pluck("friend_id")->toArray();
$my_friend_id=array_unique($my_friend_id);
 
  
$my_friends_two=DB::table('friendships')->
where("friend_id",$user_id)

->get();
$my_friend_two=$my_friends_two->pluck("user_id")->toArray();
$my_friend_id=array_unique(array_merge($my_friend_two,$my_friend_id));
 
// dd($my_friend_fr_id);
    $myfriend_fr=User::where("id","!=",Auth::user()->id)
    
    ->where("users.city",Auth::user()->city)
  

    


  ->whereNotIn("users.id",$my_friend_id)
    ->withCount("mutualFriends")
    ->with("user_detail")
    ->get();
    
    //dd(  $myfriend_fr->toArray());
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
   //  $news=   Http::get("https://newsapi.org/v2/everything?q=business&pageSize=10&from=".$from."&to=".$today."&sortBy=publishedAt&apiKey=678ef3c38bfd4689b825ca92dbfe9e6c");
     $cacheKey = 'business_news';
     $cacheTime = 1440; // Cache time in minutes for one day
     
     // Attempt to retrieve news from cache
     $news = Cache::remember($cacheKey, $cacheTime, function () use ($from, $today) {
         // Fetch news from API if not found in cache
      
        });

        $news= Http::get("https://newsapi.org/v2/everything?q=business&pageSize=10&from=".$from."&to=".$today."&sortBy=publishedAt&apiKey=678ef3c38bfd4689b825ca92dbfe9e6c");
        $news_data=$news->json();
        $news_data = json_decode(json_encode($news_data)); 
 $data["news"]=$news_data->articles;
  
//unset($news_data["source"]);
//unset($news_data["source"]);
//publishedAt

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
$my_friend_id_find=["4"];


$myfriendsData=DB::table('friendships')->where("user_id",$user_id)

->get();

$my_friend_id_find=$myfriendsData->pluck('friend_id')->toArray();
$myfriendsDatas=DB::table('friendships')->where("friend_id",$user_id)

->get();
$my_friend_id_finds=$myfriendsDatas->pluck('user_id')->toArray();
$my_friend_id_find=array_merge($my_friend_id_finds,$my_friend_id_find);
$my_friend_id_find=array_unique($my_friend_id_find);
//->withCount("mutualFriends")
$my_friend_records=User::whereIn("users.id",$my_friend_id_find)
->with("user_detail")
->get();

//dd($my_friend_records->toArray());
    $data["my_friend_records"]=$my_friend_records;
    Cache::put('news',$news);
    $locationUrl="http://ip-api.com/json";
    $locationUrl = Http::get($locationUrl);
   $locationData= $locationUrl->json();
      $locationData=json_decode(json_encode($locationData),true);
       $countryCode=$locationData["countryCode"];
       $country=$locationData["country"];
       $city=$locationData["city"];
   // dd($locationUrl->json());
    // Your API key from OpenWeatherMap
$apiKey = 'ea5a30bfb37bbf5ee5752dec4842320f';

// City and country code for which you want to fetch the weather
//$city = 'London';
//$countryCode = 'GB';

// API URL to fetch current weather data
$url = "http://api.openweathermap.org/data/2.5/weather?q=$city,$countryCode&appid=$apiKey&units=metric";

// Make the API request
$response = Http::get($url);
   // dd($response->json());
// Decode JSON response
$datas = json_decode($response);
//echo "<pre>";
   //print_r($datas);
// Check if data was retrieved successfully
if ($datas && $datas->cod == 200) {
    // Extract relevant weather information
    $temperature = $datas->main->temp;
    $windSpeed= $datas->wind->speed;
    $humidity = $datas->main->humidity;
    $description = $datas->weather[0]->description;
    $sunset=date("h:i a",strtotime($datas->sys->sunrise));
    // Output the weather information
 
 
} else {
    // Handle API error
    echo "Failed to fetch weather data. Please try again later.\n";
}
$data["country"]=$country;
$data["city"]=$city;
$data["Temperature"]=$temperature." °C";
$data["Humidity"]=$humidity."%";
 $data["description"]=$description;
    $data["windSpeed"]=$windSpeed." Km/h";
   //dd($data);
        return view("index",$data);
    }
    public function user_profile($id=null){
      $data=$this-> userRecord($id);
      if($id==null){
        $id=Auth::user()->id;
      }else{
        $id=$id;
      }
      $friend_one=DB::table('friendships')->where("user_id",Auth::user()->id)
      ->where("friend_id","!=",Auth::user()->id)
     
      ->get();
      $friend_id_one=$friend_one->pluck("friend_id")->toArray();
      $friend_two=DB::table('friendships')->where("friend_id",Auth::user()->id)
      ->where("user_id","!=",Auth::user()->id)
     
      ->get();
      $friend_id_two=$friend_two->pluck("user_id")->toArray();
  
      $friend_id_array=array_unique(array_merge( $friend_id_two, $friend_id_one));
    
      $posts=   Post::withCount(['likes',"comments"])
  ->with(["user","comments"=>function($query){
    $query->select( "user_details.profileImage","comments.user_id","comments.post_id","comments.comment_content","users.name","comments.created_at");
    $query->join("users","users.id","=","comments.user_id");
    $query->leftJoin("user_details","user_details.user_id","=","comments.user_id");
  },"likes"=>function($query)
  {
    $query->select("likes.user_id","likes.post_id","users.name");
    $query->join("users","users.id","=","likes.user_id");
  }
  ])->where("posts.user_id",$id)
  ->orwhereIn("posts.user_id", $friend_id_array)
  ->get();
  $social_page_followers=DB::table("social_page_followers")->where("user_id",$id)->get();
   $social_page_id=$social_page_followers->pluck("social_page_id")->toArray();
$social_owner=DB::table("social_pages")->where("owner_id",$id)->get();
   $social_page_oown_id=$social_owner->pluck("id")->toArray();
    $page_id=array_unique(array_merge( $social_page_id, $social_page_oown_id));
     
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

     $data["user_posts"] =$posts;
     $data["user_pages_posts"]=  $user_posts_page;
      /// dd($data);
      return view("my_profile",$data);
    }
    public function generateText($prompt)
    {

   
      $result = OpenAI::chat()->create([
        'model' => 'gpt-3.5-turbo',
        'messages' => [
            ['role' => 'user', 'content' => 'ai post about technology'],
        ],
    ]);
    return  $result["choices"][0]["message"]["content"];
    
    
        
      
    }
    public function post_ai(){
      try{
      $prompt="ai post";
  $postContent=  $this-> generateText($prompt);
echo json_encode(["post_content"=>$postContent,"status"=>"success"]);
      }catch(\Exception $e){
          echo $e->getMessage();
      }
    }
    public function user_post(Request $req){
      try{
      $postData=  $req->validate([
          "content"=>"required"
      ]);
      $user_id=Auth::user()->id;
     $postData= array_merge($postData,["user_id"=>$user_id,"created_at"=>date("Y-m-d H:i:s"),
    "visibility"=>"friends"
    ]);
    if($req->hasFile('file')) {
      $file = $req->file('file');

      // Get the file extension
      $extension = $file->extension();
      $customName=time().".".$extension;
          if($extension=="mp4"){
            $file->move(public_path('assets\images\videos'), $customName);
            $postData=array_merge($postData,["video"=>$customName]);
          }else{
            $file->move(public_path('assets\images\post'), $customName);
            $postData=array_merge($postData,["image"=>$customName]);
          }
      
      
        
         
    }
    //$folderPath = public_path('your-folder-name');

    // Create the directory if it doesn't exist
   // File::makeDirectory($folderPath);  
   /// print_r($postData); 
     DB::table('posts')->insert($postData);

     $notify=Auth::user()->name." has a post";
  
     $userFrienddata=DB::table('friendships')->where("user_id",Auth::user()->id)
     ->where("friend_id","!=",Auth::user()->id)
     ->get();
     $friend_ids= $userFrienddata->pluck("friend_id")->toArray();
     $userFrienddatasend=DB::table('friendships')->where("friend_id",Auth::user()->id)
     ->where("user_id","!=",Auth::user()->id)
     ->get();
     $friend_ids_second=   $userFrienddatasend->pluck("user_id")->toArray();
     $friend_ids=array_unique(array_merge($friend_ids_second,$friend_ids));
     if(count($friend_ids) > 0){
          foreach($friend_ids as $friend_id){
           if($friend_id!=Auth::user()->id){
    DB::table('users_notification')->insert([
       "nofication"=>$notify,
       "user_id"=>$friend_id,
       "created_at"=>date("Y-m-d H:i:s")
           ]);
         }
         }
         $notificationsUser=user_noftifictaion::all();
         $notifys=[
           "notifications"=> $notificationsUser,
           "notification_count"=>count($notificationsUser)
         ];
   event(new NotificationUser($notifys));

        }






    }catch(\Exception $e){
      echo $e->getMessage();
    }
    }
  function   userphoto(Request $req){

    
    if ($req->hasFile('userphoto')) {
      $profilePicFile = $req->file('userphoto');
      $profilePicCustomName = time() . '.' . $profilePicFile->getClientOriginalExtension();
      $profilePicFile ->move(public_path("assets/images/albums/".Auth::user()->name),    $profilePicCustomName);
      DB::table('users_photo')->insert([
        "photos"=>    $profilePicCustomName,
        "user_id"=>Auth::user()->id
      ]);
      $notify=Auth::user()->name." upload a photo";
      $userFrienddata=DB::table('friendships')->where("user_id",Auth::user()->id)
      ->where("friend_id","!=",Auth::user()->id)
      ->get();
      $friend_ids= $userFrienddata->pluck("friend_id")->toArray();
      $userFrienddatasend=DB::table('friendships')->where("friend_id",Auth::user()->id)
      ->where("user_id","!=",Auth::user()->id)
      ->get();
      $friend_ids_second= $userFrienddatasend->pluck("user_id")->toArray();
      $friend_ids=array_unique(array_merge($friend_ids_second,$friend_ids));
           foreach($friend_ids as $friend_id){
            if($friend_id!=Auth::user()->id){
     DB::table('users_notification')->insert([
        "nofication"=>$notify,
        "user_id"=>$friend_id,
        "created_at"=>date("Y-m-d H:i:s")
            ]);
          }
          }
          $notificationsUser=user_noftifictaion::all();
              $notifys=[
                "notifications"=> $notificationsUser,
                "notification_count"=>count(  $notificationsUser)
              ];
        event(new NotificationUser($notifys));
        
  
     return back();
    }else{
      return back()->with("status","Please Add Photo");
    }
    }
   function user_event(Request $req){
  
    if ($req->hasFile('event_cover_photo')) {
      $profilePicFile = $req->file('event_cover_photo');
 
      $profilePicCustomName = time() . '.' . $profilePicFile->getClientOriginalExtension();
      $profilePicFile ->move(public_path("assets/images/events"),$profilePicCustomName);

    }
    DB::table('users_events')->insert([
"event_name"=>$req->post("event_name"),
"description"=>$req->post("event_description"),
"event_image"=>$profilePicCustomName,
"event_date"=>$req->post("event_date"),
"entry_fee_currency"=>$req->post("entry_fee_currency"),
"entry_fee"=>$req->post("entry_fee"),
"event_type"=>$req->post("entry_type"),
'mode'=>$req->post("mode"),
"start_time"=>$req->post("event_start_date"),
"end_time"=>$req->post("event_end_date"),
"user_id"=>Auth::user()->id,
"location"=>$req->post("event_location")

    ]);
    $notify=Auth::user()->name." has Made A Event";
    
   $userFrienddata=DB::table('friendships')->where("user_id",Auth::user()->id)
   ->where("friend_id","!=",Auth::user()->id)
   ->get();
   $friend_ids= $userFrienddata->pluck("friend_id")->toArray();
   $userFrienddatasend=DB::table('friendships')->where("friend_id",Auth::user()->id)
   ->where("user_id","!=",Auth::user()->id)
   ->get();
   $friend_ids_second= $userFrienddatasend->pluck("user_id")->toArray();
   $friend_ids=array_unique(array_merge($friend_ids_second,$friend_ids));
        foreach($friend_ids as $friend_id){
         if($friend_id!=Auth::user()->id){
  DB::table('users_notification')->insert([
     "nofication"=>$notify,
     "user_id"=>$friend_id,
     "created_at"=>date("Y-m-d H:i:s")
         ]);
       }
      }
       $notificationsUser=user_noftifictaion::all();
       $notifys=[
         "notifications"=> $notificationsUser,
         "notification_count"=>count(  $notificationsUser)
       ];
 event(new NotificationUser($notifys));
    return back();
   }
 function   userpage(Request $req) 
   {
 
    if ($req->hasFile('page_logo')) {
      $profilePicFile = $req->file('page_logo');
       $profilePicCustomName = time() . '.' . $profilePicFile->getClientOriginalExtension();
      $profilePicFile ->move(public_path("assets/images/logo"),$profilePicCustomName);
    }
  $page_id= DB::table('social_pages')->insertGetId([
"page_name"=>$req->post("page_name"),
"page_logo"=>   $profilePicCustomName,
"owner_id"=>Auth::user()->id
   ]
   );
   DB::table('social_page_followers')->insert([
"social_page_id"=>  $page_id,
"user_id"=>Auth::user()->id
   ]);
   $notify=Auth::user()->name." has Made A Page";
  
   $userFrienddata=DB::table('friendships')->where("user_id",Auth::user()->id)
   ->where("friend_id","!=",Auth::user()->id)
   ->get();
   $friend_ids= $userFrienddata->pluck("friend_id")->toArray();
   $userFrienddatasend=DB::table('friendships')->where("friend_id",Auth::user()->id)
   ->where("user_id","!=",Auth::user()->id)
   ->get();
   $friend_ids_second= $userFrienddata->pluck("user_id")->toArray();
   $friend_ids=array_unique(array_merge($friend_ids_second,$friend_ids));
        foreach($friend_ids as $friend_id){
         if($friend_id!=Auth::user()->id){
  DB::table('users_notification')->insert([
     "nofication"=>$notify,
     "user_id"=>$friend_id,
     "created_at"=>date("Y-m-d H:i:s")
         ]);
       }
       $notificationsUser=user_noftifictaion::all();
       $notifys=[
         "notifications"=> $notificationsUser,
         "notification_count"=>count(  $notificationsUser)
       ];
 event(new NotificationUser($notifys));
       }
  return back();
  }
   function user_video(Request $req){
 
    if ($req->hasFile('videos_cover_photo')) {
      $profilePicFile = $req->file('videos_cover_photo');
       $profilePicCustomName = time() . '.' . $profilePicFile->getClientOriginalExtension();
      $profilePicFile ->move(public_path("assets/images/albums"),$profilePicCustomName);
    }
    if ($req->hasFile('videos')) {
      $profilePicFile = $req->file('videos');
      $profilePic= time() . '.' . $profilePicFile->getClientOriginalExtension();
      $profilePicFile ->move(public_path("assets/images/videos"),$profilePic);
    }
    DB::table('users_video')->insert([
      "videos_cover_photo"=> $profilePicCustomName,
      "videos"=>   $profilePic,
      "duration"=>$req->post("duration"),
      "user_id"=>Auth::user()->id,
      "created_at"=>date("Y-m-d H:i:s")
    ]);



    $notify=Auth::user()->name." has upload a video";
  
    $userFrienddata=DB::table('friendships')->where("user_id",Auth::user()->id)
    ->where("friend_id","!=",Auth::user()->id)
    ->get();
    $friend_ids= $userFrienddata->pluck("friend_id")->toArray();
    $userFrienddatasend=DB::table('friendships')->where("friend_id",Auth::user()->id)
    ->where("user_id","!=",Auth::user()->id)
    ->get();
    $friend_ids_second= $userFrienddata->pluck("user_id")->toArray();
    $friend_ids=array_unique(array_merge($friend_ids_second,$friend_ids));
         foreach($friend_ids as $friend_id){
          if($friend_id!=Auth::user()->id){
   DB::table('users_notification')->insert([
      "nofication"=>$notify,
      "user_id"=>$friend_id,
      "created_at"=>date("Y-m-d H:i:s")
          ]);
        }
        }
        $notificationsUser=user_noftifictaion::all();
        $notifys=[
          "notifications"=> $notificationsUser,
          "notification_count"=>count(  $notificationsUser)
        ];
  event(new NotificationUser($notifys));

return back();
   }
    public function settings(Request $req) {
      try {
          $user_name = $req->post("name");
          $job_title = $req->post("job_title");
          $bio = $req->post("bio");
          $email = $req->post("email");
          $mobile = $req->post("mobile");
  
          $loginUserData = DB::table('users')->where("id", Auth::user()->id)->first();
  
          // Check if user has changed username before moving files
          if ($user_name !== $loginUserData->name) {
              $albumsPath = public_path('assets/images/albums/');
              $profilePicPath = public_path('assets/images/profilepic/');
              $coverPhotoPath = public_path('assets/images/coverphoto/');
  
              // Move files only if source and destination paths are valid
              if (File::exists($albumsPath . $loginUserData->name)) {
                  File::move($albumsPath . $loginUserData->name, $albumsPath . $user_name,0777);
              }
              if (File::exists($profilePicPath . $loginUserData->name)) {
                  File::move($profilePicPath . $loginUserData->name, $profilePicPath . $user_name,0777);
              }
              if (File::exists($coverPhotoPath . $loginUserData->name)) {
                  File::move($coverPhotoPath . $loginUserData->name, $coverPhotoPath . $user_name,0777);
              }

              $notify=Auth::user()->name." has changed User Name To ".$user_name;
  
              $userFrienddata=DB::table('friendships')->where("user_id",Auth::user()->id)
              ->where("friend_id","!=",Auth::user()->id)
              ->get();
              $friend_ids= $userFrienddata->pluck("friend_id")->toArray();
              $userFrienddatasend=DB::table('friendships')->where("friend_id",Auth::user()->id)
              ->where("user_id","!=",Auth::user()->id)
              ->get();
              $friend_ids_second= $userFrienddatasend->pluck("user_id")->toArray();
              $friend_ids=array_unique(array_merge($friend_ids_second,$friend_ids));
                   foreach($friend_ids as $friend_id){
                    if($friend_id!=Auth::user()->id){
             DB::table('users_notification')->insert([
                "nofication"=>$notify,
                "user_id"=>$friend_id,
                "created_at"=>date("Y-m-d H:i:s")
                    ]);
                  }
                  }
                  $notificationsUser=user_noftifictaion::all();
                  $notifys=[
                    "notifications"=> $notificationsUser,
                    "notification_count"=>count(  $notificationsUser)
                  ];
            event(new NotificationUser($notifys));



          }
          DB::table('users')->where("id", Auth::user()->id)->update([
            "name" => $user_name
          ]);
          if($req->hasFile('profilepic') && $user_name !== $loginUserData->name){
            return back()->with("status","You Can't Change Username & Upload Pic");
          }
          if ($req->hasFile('profilepic')) {
            $notify=Auth::user()->name." has changed profile pic ";
  
            $userFrienddata=DB::table('friendships')->where("user_id",Auth::user()->id)
            ->where("friend_id","!=",Auth::user()->id)
            ->get();
            $friend_ids= $userFrienddata->pluck("friend_id")->toArray();
            $userFrienddatasend=DB::table('friendships')->where("friend_id",Auth::user()->id)
            ->where("user_id","!=",Auth::user()->id)
            ->get();
            $friend_ids_second= $userFrienddatasend->pluck("user_id")->toArray();
            $friend_ids=array_unique(array_merge($friend_ids_second,$friend_ids));
                 foreach($friend_ids as $friend_id){
                  if($friend_id!=Auth::user()->id){
           DB::table('users_notification')->insert([
              "nofication"=>$notify,
              "user_id"=>$friend_id,
              "created_at"=>date("Y-m-d H:i:s")
                  ]);
                }
                }
                $notificationsUser=user_noftifictaion::all();
                $notifys=[
                  "notifications"=> $notificationsUser,
                  "notification_count"=>count(  $notificationsUser)
                ];
          event(new NotificationUser($notifys));


              $profilePicFile = $req->file('profilepic');
              $profilePicCustomName = time() . '.' . $profilePicFile->getClientOriginalExtension();
              $profilePicPath = public_path('assets/images/profilepic/');
              if (File::exists($profilePicPath.$user_name)) {
              $profilePicFile->move(public_path("assets/images/profilepic/" .$user_name), $profilePicCustomName);
              }else{
                $profilePicFile->move(public_path("assets/images/profilepic/" .$user_name), $profilePicCustomName);
              }
              // Update profile image in database
              DB::table('user_details')->where("user_id", Auth::user()->id)->update([
                  "profileImage" => $profilePicCustomName
              ]);
          }
  
          if ($req->hasFile('coverphoto')) {
              $coverPhotoFile = $req->file('coverphoto');
              $coverPhotoCustomName = time() . '.' . $coverPhotoFile->getClientOriginalExtension();

              $coverPhotoFile->move(public_path("assets/images/coverphoto/" . $user_name), $coverPhotoCustomName);
              // Update cover photo in database
              DB::table('users')->where("id", Auth::user()->id)->update(["cover_photo" => $coverPhotoCustomName]);
          }
  
          // Update user details in database
          DB::table('user_details')->where("user_id", Auth::user()->id)->update([
              "job_title" => $job_title,
              "bio" => $bio
          ]);
  
          // Update user information in database
          DB::table('users')->where("id", Auth::user()->id)->update([
            "name" => $user_name,
              "email" => $email,
              "mobile" => $mobile
          ]);
  
          return back()->with('success', 'Settings updated successfully');
      } catch (\Exception $e) {
          // Log or handle the exception
        return back()->with("status","You Can't Change Username & Change profile pic at same time");
      }
  }
  
    
    public function makeFolder (){
      $users=DB::table('users')->get();
      foreach($users as $user){
        $folderPaths = public_path("assets/images/coverphoto/".$user->name);
        if (!file_exists($folderPaths)) {
            File::makeDirectory($folderPaths,0777,true,true);
        }
       $userPhotoDta= DB::table('users_photo')->where("user_id",$user->id)->first();
       $photos=   $userPhotoDta->photos;
        $sourcePath = public_path("assets/images/bg/".$user->name)."/".$photos;
        $destinationPath = public_path("assets/images/coverphoto/".$user->name) .$user->name.".jpg";
        $userData= DB::table('user_details')->where("user_id",$user->id)->first();
   
        DB::table('users')->where("id",$user->id)->update([
          "cover_photo"=>"04.jpg"
        ]);
         
      }
    // Create the directory if it doesn't exist
   
    }
 ///   $originalFolder = public_path('oldFolderName');
///$newFolder = public_path('newFolderName');

///if (File::exists($originalFolder)) {
   // File::move($originalFolder, $newFolder);
    //echo "Folder renamed successfully.";
//} else {
   // echo "Folder does not exist.";
//}

   public function addfriend($id){
    DB::table('friendships')->insert([
"user_id"=>Auth::user()->id,
"friend_id"=>$id,
"friend_ship_status"=>1,
"created_at"=>date("Y-m-d H:i:s")
    ]);
    $friend_id_data=DB::table('users')->where("id",$id)->first();
    $nofication="$friend_id_data->name has sent you a friend request";
   /* DB::insert('insert into users_notification (user_id,nofication,created_at) values (?, ?,?)', [Auth::user()->id, 
    $nofication,date("Y-m-d H:i:s")]);*/
    DB::table("followings")->insert([
      "follower_id"=>Auth::user()->id,
      "user_id"=>$id,
      "created_at"=>date("Y-m-d H:i:s")
    ]);
    DB::table("followings")->insert([
      "follower_id"=>$id,
      "user_id"=>Auth::user()->id,
      "created_at"=>date("Y-m-d H:i:s")
    ]);
    return redirect()->back();
   }
   public function user_profile_connections($id=null){
    $data=$this-> userRecord($id);
     //  dd($data);
    return view("my_profile_connection",$data);
   }
 function  user_videos($id=null){
  $data=$this->userRecord($id);
 // dd($data);
 return view("user_video",$data);
 }
function user_about($id=null){
 $data=$this-> userRecord($id);
 //dd($data);
return view("user_profile_about",$data);
 


}

public function user_profile_event($id=null){
  if($id==null){
    $id=Auth::user()->id;
  }else{
    $id=$id;
  }
  $data=$this-> userRecord($id);
  $data["users_events"]=DB::table('users_events')->where("user_id",$id)->get();
 // dd($data);
  return view("user_event",$data);
}
   function userRecord($id=null){
    $data["user_id"]=$id;
    if($id==null){
      $user_id=Auth::user()->id;
                }else{
                  $user_id=$id;
                }
              $loginEdUserData=Auth::user()->with("user_detail")->where("id",Auth::id())->get();
           
                $loginprofileimage;
                     $user_data=User::where("id",$user_id)->first();
                     $user_name=   $user_data->name;
                     $user_email=   $user_data->email;
                     $user_cover_photo=$user_data->cover_photo;
                     $data["city"]=$user_data->city;
               
                     $data["coverphoto"]=asset("assets/images/coverphoto/".$user_name."/".$user_cover_photo);
                   /* dd($data[
                      "coverphoto"
                     ]);*/
                     $data["maritual_status"]=$user_data->maritual_status;
                     $user_join_date=date("M d,Y",strtotime($user_data->created_at));
                     $dateofbirth=date("F d,Y",strtotime($user_data->dateofbirth));
        $user_details=DB::table("user_details")->where("user_id",$user_id)->first();
        $my_friends=DB::table('friendships')
        ->where("friend_id",$user_id)
        
        ->get();
        $my_friend_ids= $my_friends->pluck("user_id");
        $my_friend_array_id=$my_friend_ids->toArray();
       //   print_r($my_friend_array_id);
        $my_friend_array_id=array_unique($my_friend_array_id);

        $my_friends_second=DB::table('friendships')
        ->where("user_id",$user_id)
     
        ->get();
        $my_friend_ids_second= $my_friends_second->pluck("friend_id");
        $my_friend_array_id_second=$my_friend_ids_second->toArray();
        $my_friend_array_id_second=array_unique($my_friend_array_id_second);
        $my_friend_array_id=array_merge($my_friend_array_id_second,$my_friend_array_id);
        
        $my_friend_array_id=array_unique($my_friend_array_id);
 

     //  $my_friend_array_id=array_unique($my_friend_array_id);
  //  $my_friend_data=$my_friend_data->toArray();
        //  dd($my_friend_data);
       // dd($my_friend_array_id);
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
            $profile_job="web Developer";
            $profile_bio="I am Web developer";
        }
        $data["profileimage"]=$profile_image;
        $data["job_title"]= $profile_job;
        $data["user_name"]=$user_name;
        $data["user_email"]=$user_email;
        $data["dateofbirth"]=$dateofbirth;
        $data["bio"]=  $profile_bio;
        $data["my_friend_array_id"]= $my_friend_array_id;

       if( !in_array(Auth::user()->id,$my_friend_array_id)){
           $data["friends"]=0;
       }else{
        $data["friends"]=1;
       }  
       
        $data["user_photos"]=DB::table('users_photo')->where("user_id",$user_id)->orderBy('photos')->get();
        $data["user_pages"]=DB::table("social_page_followers")->
       select("page_logo","page_name","social_pages.id as page_id") ->
        join("social_pages","social_pages.id","=","social_page_followers.social_page_id")->
        where("social_page_followers.user_id",$user_id)->get();
        $data["user_videos"]=DB::table('users_video')->where("user_id",$user_id)->get();
        $my_friend_data= User::whereIn("users.id",$my_friend_array_id)
        ->withCount("mutualFriends")
         ->withCount("friends")
        ->with("user_detail")
        ->get();
        $data["user_join_date"]=$user_join_date;
        $data["loginEdUserData"]=$loginEdUserData;
      $data["my_friend_data"]=$my_friend_data;
        $data["my_friend_count"]=count($my_friend_data);
        $data["user_id"]=$id;
        //events_attendees
        //	event_id
        //users_events
        
        return $data;
   }
   public function unfriend($id){
    $friend_id= $id;
    $user_id=Auth::user()->id;
    $dataFriend= DB::table('friendships')->where("user_id",$user_id)
    ->where("friend_id",$friend_id)
    ->orwhere("user_id",$friend_id)
    ->where("friend_id",$user_id)
    ->first();
  $followings=   DB::table("followings")-> where("follower_id",$id)->
    where("user_id",$user_id)
  ->orwhere("follower_id",$user_id)
  ->where("user_id",$id)
  ->delete();
   
  


  
 $friend_ship_id=$this->findFriendShipId($user_id,$friend_id);
 
 DB::table('friendships')->where("id",$friend_ship_id)->delete();
 return back();
   }
   public function findFriendShipId($user_1,$user_2){
    $dataFriend= DB::table('friendships')->where("user_id",$user_1)
    ->where("friend_id",$user_2)
    ->orwhere("user_id",$user_2)
    ->where("friend_id",$user_1)
    ->first();
    return $dataFriend->id;
   }
   public function deleteaccount(){
    $frienddata=DB::table('friendships')->where("user_id",Auth::user()->id)
    ->where("friend_id","!=",Auth::user()->id)
    ->orwhere("user_id","!=",Auth::user()->id)
    ->where("friend_id",Auth::user()->id)
    ->delete();
    $frienddata=DB::table('posts')->where("user_id",Auth::user()->id)->delete();
      
       
           $folderPaths = public_path("assets/images/coverphoto/".Auth::user()->name);
         File::deleteDirectory($folderPath);
           $folderPaths = public_path("assets/images/profilepic/".Auth::user()->name);
       File::deleteDirectory($folderPath);
           $folderPaths = public_path("assets/images/albums/".Auth::user()->name);
        File::deleteDirectory($folderPath);
           // Delete the folder
         
           DB::table('users')->where("id",Auth::user()->id)->delete();
   }
   public function chats (Request $req){
    try{
      $userData=DB::table('users')->where("id",Auth::user()->id)->first();
      $username=$userData->name;
      $userDataDetail=DB::table('user_details')->where("user_id",Auth::user()->id)->first();
      $userProfileImage=    $userDataDetail->profileImage;
      if ($req->hasFile('chats_file') ) {
        $filechats=$req->file('chats_file');
      
         $extension = $filechats->extension();
        $customName=time().".".$extension;
     
        $filePath=asset('assets/chats/'.$customName);

                          $filechats->move(public_path('assets/chats'),$customName);
                     
                          if($extension==="mp4"){
                            $fileType='video';

                          }else{
                            $fileType="image";
                          }
                          
                          
          
      }else{

        $filePath=null;
        $fileType=null;
        
  
      }
   

     
  $chats=social_chat::create([
    "sender_id"=>Auth::user()->id,
    'receiver_id'=>$req->post("receiver_id"),
    "msg"=>$req->post("msg"),
    
     "filechats"=>  $filePath,
     "file_type"=>  $fileType,
     "receiver_photo"=>asset('assets/images/profilepic/'.$username."/".$userProfileImage)
  ]);
  
  event(new UserMessage($chats));
  
  return response()->json(["data"=>$chats,"status"=>"success"]);
}
    catch(\Exception $e){
      return response()->json(["data"=>$e->getMessage(),"status"=>"error"]);
    }
  
   }
  function postcomment(Request $req){
    $post_id=$req->post_id;
    $post_data=DB::table('posts')->where("id",$post_id)->first();
    $user_id=$post_data->user_id;
    if(Auth::user()->id!=$user_id){
    $notify=Auth::user()->name." has comment on your post";

    DB::table('users_notification')->insert([
      "nofication"=>$notify,
      "user_id"=>$user_id,
      "created_at"=>date("Y-m-d H:i:s")
          ]);
    }
    DB::table('comments')->insert([
       "comment_content" =>$req->comment_content,
      "post_id"=> $post_id,
      "user_id"=>Auth::user()->id,
      "created_at"=>date("Y-m-d H:i:s")
    ]);
    $notificationsUser=user_noftifictaion::all();
    $notifys=[
      "notifications"=> $notificationsUser,
      "notification_count"=>count(  $notificationsUser)
    ];
event(new NotificationUser($notifys));
   return back();
  }
  function chatsload(Request $req){
  try{
    $req->all();
     "receiver_id". $receiver_id=$req->receiver_id;
     "sender_id". $sender_id=$req->sender_id;
$chats=social_chat::where(function($query) use ($req){
     
    $query->where("sender_id",$req->sender_id)
   ->orWhere("sender_id",$req->receiver_id);
})->where(function($query) use ($req){
  $query->where("receiver_id",$req->sender_id)
  ->orWhere("receiver_id",$req->receiver_id);
})->get();
    
    //receiver_id/
    //sender_id
    return response()->json(["status"=>"success","data"=>$chats]);
  }catch(\Exception $e){
    echo $e->getMessage();
  }
   }  
}
