<?php

include "config/db.php";

$userid = 4;
$postid = $_POST['postid'];
$rating = $_POST['rating'];

// Check entry within table
$query = "SELECT COUNT(*) AS cntpost FROM post_rating WHERE postid=".$postid." and user_id=".$userid;

$result = mysqli_query($conn,$query);
$fetchdata = mysqli_fetch_array($result);
$count = $fetchdata['cntpost'];

if($count == 0){
    $insertquery = "INSERT INTO post_rating(user_id,postid,rating) values(".$userid.",".$postid.",".$rating.")";
    mysqli_query($conn,$insertquery);
}else {
    $updatequery = "UPDATE post_rating SET rating=" . $rating . " where user_id=" . $userid . " and postid=" . $postid;
    mysqli_query($conn,$updatequery);
}


// get average
$query = "SELECT ROUND(AVG(rating),1) as averageRating FROM post_rating WHERE postid=".$postid;
$result = mysqli_query($conn,$query) or die(mysqli_error());
$fetchAverage = mysqli_fetch_array($result);
$averageRating = $fetchAverage['averageRating'];

$return_arr = array("averageRating"=>$averageRating);

echo json_encode($return_arr);