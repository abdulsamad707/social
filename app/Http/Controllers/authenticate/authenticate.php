<?php

namespace App\Http\Controllers\authenticate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\sigin;
use App\Http\Requests\signup;
use App\Http\Requests\SendLink;
use App\Http\Requests\ResetPassword;
use Auth;
use Hash;
use App\Models\referal;
use App\Models\User;
use DB;
use Mail;
use Str;
use Http;
use Twilio\Rest\Client;
use Torann\GeoIP\Facades\GeoIP;
use Stevebauman\Location\Facades\Location;
class authenticate extends Controller
{
    public function register(signup $req){
        $validated   =   $req->validated();
        
          if($validated["referalcode"]!=null){
            $referalcode  =  $validated["referalcode"];
            $referalCodeData=referal::where("referalCode",$referalcode)->first();
            $from_referal_id=$referalCodeData->id;
            $validated["from_referal_id"]=$from_referal_id;
          
          }
        

         $referal= referal::create([
"referalCode"=>Str::random(6)
                
          ]);
           $referal_id= $referal->id;
           $validated["referal_id"]=$referal_id;
           $mobile = ltrim($validated["mobile"], '0');
           $validated["mobile"]=$mobile;
           User::create($validated);
       unset($validated["referalcode"]);
          return redirect(url("login"));
    }
    public function logined(sigin $req){


        $validated= $req->validated();
        extract($validated);
        Auth::attempt(['email' => $email, 'password' => $password]);
        if(!Auth::check()){
          return redirect(url("login"))->with("error","Invalid Credential")->withInput();
        }else{
          return redirect(url("/"));
        }
      
    }
    public function signout(){
      Auth::logout();
      return redirect(url("login"));
    }
    public function sendMsg($number_mobile,$msg){
      
      $sid ="AC0c4aa1c0a4971ae46aa41dad027c9dec";
      
     $token ="2d936783c24bfb4616f8a99db4f4cfb1";
 
      $client = new Client($sid, $token);
   
  
     // https://maps.googleapis.com/maps/api/geocode/json
   //  AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg

  $sendoBj=    $client->messages->create(
        // The number you'd like to send the message to
        $number_mobile,
        [
            // A Twilio phone number you purchased at https://console.twilio.com
            'from' => '+15074734308',
            // The body of the text message you'd like to send
            'body' =>$msg
        ]
    );

    }
    public function sendEmail($data,$email,$subject,$view_name){
      Mail::send($view_name, $data, function ($message) use ($email,$subject){
       
        $message->to($email,"To User");
    
        $message->subject($subject);
 
    });
    }
    public function sendlink(SendLink $req){
      try{
      
          $validated=$req->validated();
          extract($validated);
        $tokenData=DB::table('password_reset_tokens')->where("email",$email);
        $tokenDatas=  $tokenData->first();
        $otp=rand(1111,9999);
        if($tokenDatas){
           $tokenData->update([
              "created_at"=>date("Y-m-d H:i:s"),
              "otp"=>$otp

           ]);
          $token=   $tokenDatas->token;

        }else{
             $token=Str::random(6);
             DB::table('password_reset_tokens')->insert([
               "email"=>$email,
               "token"=>$token,
               "created_at"=>date("Y-m-d H:i:s"),
               "otp"=>$otp
             ]);
        } 
        $data["token"]=$token;
      $userData = DB::table('users')->where("email",$email)->first();
      $username=$userData->name;
      $subject="Password Reset Link";
      $view_name="mail.sendlink";
     $this->sendEmail($data,$email,$subject,$view_name);
  
       // https://maps.googleapis.com/maps/api/geocode/json
     //  AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg

      $number_mobile='+92'.$userData->mobile;
      $msg="Your Password Reset Otp:".$otp;
   $this->sendMsg($number_mobile,$msg);
      $mobile="0".$userData->mobile;
      return redirect()->back()->with("success","Reset Password Link Send To ${email} And Otp To ${mobile} ")->withInput();
      }catch(\Exception $e){
        return redirect()->back()->with("error","Something Went Wrong".$e->getMessage())->withInput();
      }
  
       
    }
    public function  reset_password($token){
      $tokenData=DB::table('password_reset_tokens')->where("token",$token);
      $tokenDatas=  $tokenData->first();
      if(!$tokenDatas){
        return redirect(url("forgotpassword"))->with("error","Invalid Token");
      }
           
      $created_at=    strtotime($tokenDatas->created_at);
      $current_time=time();
              $diff=$current_time-$created_at;
              $minute=ceil($diff/60);
              if($minute > 5){
                return redirect(url("forgotpassword"))->with("error","Token Expired");
              }
             
  
        return view("authenticate.reset_password",compact("token"));
    }
    public function change_password(ResetPassword $req){

     $validated=   $req->validated();
     extract($validated);
    $tokenData=DB::table('password_reset_tokens')->where("token",$token);
    $tokenDatas=  $tokenData->first();
    if(!$tokenDatas){
      return redirect(url("forgotpassword"))->with("error","Invalid Token");
    }
    
    $email=$tokenDatas->email;
    $databaseOtp=$tokenDatas->otp;
    if($otp!=$databaseOtp){
      return redirect()->back()->with("error","Wrong Otp");
    }
      $newPassword=Hash::make($password);
      DB::table('users')->where("email",$email)->update([
"password"=>  $newPassword
      ]);
      $sid ="AC0c4aa1c0a4971ae46aa41dad027c9dec";
        $token ="78d6bc6605aac960b46c45d73f180d23";
        $client = new Client($sid, $token);
     
      //  mail.acknowlegde
       // https://maps.googleapis.com/maps/api/geocode/json
     //  AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg
     $userData = DB::table('users')->where("email",$email)->first();
     $username=$userData->name;
     $number_mobile='+92'.$userData->mobile;
     $msg="Your Password Changed Successfully";
     $this->sendMsg($number_mobile,$msg);

      $data["message_user"]="Your Password Has Been Changed Successfully At ".date("d-F-Y h:i a");
      $view_name="mail.acknowlegde";
      $subject="Password Change";
     $this->sendEmail($data,$email,$subject,$view_name);


      return redirect(url('login'));
    }
}
