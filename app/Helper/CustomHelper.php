<?php
use App\Models\User;

function post($post,$user_id){
   return "post_id". $post."user_id".$user_id;
}
function TimeDiff($time1, $time2){
    $time1 = strtotime($time1);
    $time2 = strtotime($time2);
    
    $diff = $time2 - $time1;
    $minute = floor($diff / 60);
    $hour = floor($minute / 60);
    $day = floor($hour / 24);
    $month = floor($day / 30);
    $year = floor($month / 12);
    
    if ($diff > 60) {
        if ($minute >= 60) {
            if ($hour >= 24) {
                if ($day >= 30) {
                    if ($month >= 12) {
                        $timediff = $year . " yr";
                    } else {
                        $timediff = $month . " month";
                    }
                } else {
                    $timediff = $day . " days";
                }
            } else {
                $timediff = $hour . " hr";
            }
        } else {
            $timediff = $minute . " min";
        }
    } else {

        
        $timediff = $diff . " sec";
    }
    
    return  $timediff;

}

?>
