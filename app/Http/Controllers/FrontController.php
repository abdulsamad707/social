<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Http;
use App\Models\User;
use App\Models\Post;
use App\Models\social_chat;
use Illuminate\Support\Facades\Cache;
use App\Events\UserMessage;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\File;
class FrontController extends Controller
{


 public function chats (Request $req){
  try{
$chats=social_chat::create([
  "sender_id"=>Auth::user()->id,
  'receiver_id'=>$req->post("receiver_id"),
  "msg"=>$req->post("msg")

]);

event(new UserMessage($chats));
return response()->json(["data"=>$chats]);
  }catch(\Exception $e){
    echo $e->getMessage();
  }
return  "dd";
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

    //  dd( $post_user_ids);
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
     //  dd($data);
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
    }catch(\Exception $e){
      echo $e->getMessage();
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
"friend_ship_status"=>1
    ]);
    $friend_id_data=DB::table('users')->where("id",$id)->first();
    $nofication="$friend_id_data->name has sent you a friend request";
   /* DB::insert('insert into users_notification (user_id,nofication,created_at) values (?, ?,?)', [Auth::user()->id, 
    $nofication,date("Y-m-d H:i:s")]);*/
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
  $data=$this-> userRecord($id);
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
                     $data["users_events"]=DB::table('users_events')->where("user_id",$user_id)->get();
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
//  dd($dataFriend);
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
}
