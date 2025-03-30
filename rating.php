<?php

require_once 'config/db.php';
include('session.php');

include "config/db.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rating</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sriracha">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&family=Winky+Sans:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link href="ratingstyle.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href='jquery-bar-rating-master/dist/themes/fontawesome-stars.css' rel='stylesheet' type='text/css'>
    
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="wrapper.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sriracha">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&family=Winky+Sans:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body>

<header class="header5">
        <div class="container">
            <div class="slider-onmyoji">
                <figure></figure>
                <figure></figure>
                <figure></figure>
                <figure></figure>
                <figure></figure>
            </div>
            <nav class="navbar">
                <ul class="nav-links">
                    <li class="nav-link">
                        <a href="home.php">หน้าหลัก</a>
                    </li>
                    <li class="nav-link services">
                        <a href="homenews.php">ข้อมูลข่าวสาร
                            <span class="material-icons dropdown-icon">
                                arrow_drop_down
                            </span>
                        </a>
                        <ul class="drop-down">
                            <li><a href="gamenew.php">เกมเข้าใหม่</li></a>
                            <li><a href="news.php">อัพเดตข้อมูลในเกม</li></a>
                        </ul>
                    </li>
                    <li class="nav-link services">
                        <a href="homegame.php">หมวดหมู่เกม
                            <span class="material-icons dropdown-icon">
                                arrow_drop_down
                            </span>
                        </a>
                        <ul class="drop-down">
                            <li><a href="mmorpg.php">เกม MMORPG</li></a>
                            <li><a href="sport.php">เกมกีฬา (Sport Game)</li></a>
                            <li><a href="shooting.php">Shooting Game</li></a>
                            <li><a href="racing.php">Racing</li></a>
                        </ul>
                    </li>
                    <li class="nav-link">
                        <a href="rating.php">แนะนำเกม</a>
                    </li>
                    <li class="nav-link">
                        <a href="contact.php">พูดคุย</a>
                    </li>
                    <a href="logout.php"><button><?php 
                    echo $member_row['firstname']." ".$member_row['lastname'];
                    ?> - Log Out</button></a>

                </ul>
            </nav>                    
        </div>
    </header>
        <!-- Script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="jquery-bar-rating-master/dist/jquery.barrating.min.js" type="text/javascript"></script>
        <script type="text/javascript">
        $(function() {
            $('.rating').barrating({
                theme: 'fontawesome-stars',
                onSelect: function(value, text, event) {

                    // Get element id by data-id attribute
                    var el = this;
                    var el_id = el.$elem.data('id');

                    // rating was selected by a user
                    if (typeof(event) !== 'undefined') {
                        
                        var split_id = el_id.split("_");

                        var postid = split_id[1];  // postid

                        // AJAX Request
                        $.ajax({
                            url: 'rating_ajax.php',
                            type: 'post',
                            data: {postid:postid,rating:value},
                            dataType: 'json',
                            success: function(data){
                                // Update average
                                var average = data['averageRating'];
                                $('#avgrating_'+postid).text(average);
                            }
                        });
                    }
                }
            });
        });
      
        </script>
   
    <body>
        <div class="content">
            <p style='color: red;'>ให้คะแนน</p>
            <?php
                $userid = 4;
                $query = "SELECT * FROM posts";
                $result = mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($result)){
                    $postid = $row['id'];
                    $title = $row['title'];
                    $content = $row['content'];
                    $link = $row['link'];

                    // User rating
                    $query = "SELECT * FROM post_rating WHERE postid=".$postid." and user_id=".$userid;
                    $userresult = mysqli_query($conn,$query) or die(mysqli_error());
                    $fetchRating = mysqli_fetch_array($userresult);
                    $rating = $fetchRating['rating'];

                    // get average
                    $query = "SELECT ROUND(AVG(rating),1) as averageRating FROM post_rating WHERE postid=".$postid;
                    $avgresult = mysqli_query($conn,$query) or die(mysqli_error());
                    $fetchAverage = mysqli_fetch_array($avgresult);
                    $averageRating = $fetchAverage['averageRating'];

                    if($averageRating <= 0){
                        $averageRating = "No rating yet.";
                    }
            ?>
                    <div class="post">
                        <h2><a href='<?php echo $link; ?>' class='link' target='_blank'><?php echo $title; ?></a></h2>
                        <div class="post-text">
                            <?php echo $content; ?>
                        </div>
                        <div class="post-action">
                            <!-- Rating -->
                            <select class='rating' id='rating_<?php echo $postid; ?>' data-id='rating_<?php echo $postid; ?>'>
                                <option value="1" >1</option>
                                <option value="2" >2</option>
                                <option value="3" >3</option>
                                <option value="4" >4</option>
                                <option value="5" >5</option>
                            </select>
                            <div>.</div>
                            <div style='clear: both;'></div>
                            Average Rating : <span id='avgrating_<?php echo $postid; ?>'><?php echo $averageRating; ?></span>

                            <!-- Set rating -->
                            <script type='text/javascript'>
                            $(document).ready(function(){
                                $('#rating_<?php echo $postid; ?>').barrating('set',<?php echo $rating; ?>);
                            });
                            
                            </script>
                        </div>
                    </div>
            <?php
                }
            ?>

        </div>

        <section class="contact">
        <div class="container">
            <div class="slider-contact">
                <figure></figure>
                <figure></figure>
                <figure></figure>
                <figure></figure>
                <figure></figure>
                <div class="footer-menu">
                    <ul>
                        <li><a href="index.php">ข้อมูลการเล่น</a></li>
                        <li><a href="gamenew.php">แนะนำเกม</a></li>
                        <li><a href="news.php">ข้อมูลข่าวสาร</a></li>
                        <li><a href="contact.php">ติดต่อสอบถาม</a></li>
                    </ul>
                    <div class="footer-logo">
                        <a href="#">testing@gmail.com</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

        
    </body>
</html>
