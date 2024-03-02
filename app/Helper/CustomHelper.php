<?php

function TimeDiff($time1, $time2){
    $time1 = strtotime($time1);
    $time2 = strtotime($time2);
    
    $diff = $time2 - $time1;
    $minute = ceil($diff / 60);
    $hour = ceil($minute / 60);
    $day = ceil($hour / 24);
    $month = ceil($day / 30);
    $year = ceil($month / 12);
    
    if ($diff > 60) {
        if ($minute >= 60) {
            if ($hour >= 24) {
                if ($day >= 30) {
                    if ($month >= 12) {
                        $timediff = $year . "yr";
                    } else {
                        $timediff = $month . "month";
                    }
                } else {
                    $timediff = $day . "days";
                }
            } else {
                $timediff = $hour . "hr";
            }
        } else {
            $timediff = $minute . "min";
        }
    } else {
        $timediff = $diff . "sec";
    }
    
    return  $timediff;
}
?>
