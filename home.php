<?php


require_once 'config/db.php';
include('session.php');



$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=adminsystem", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="wrapper.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
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
                            <li><a href="contact.php">อัพเดตข้อมูลในเกม</li></a>
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

    <section class="news">
    <div news class="container-news">
                <div class="news-con">
                    <div class="news-info">
                        อัพเดตข้อมูลข่าวสารในเกม!
                    </div>

                    <div class="news-table">
                        
                    
                    <?php
                        $stml = $conn->query("SELECT * FROM news"); 
                        $stml->execute();

                        $news = $stml->fetchAll();
                        foreach ($news as $user) {
                    ?>
                        <div class="news-box">
                            
                        <td width="20px"><img class="rounded" width="100%" src="uploads/<?php echo $user['img']; ?>" alt=""></td>
                        <h3><?php echo $user['fname'] ?></h3>
                            <div class="news-box-title">
                                <a href="#"><?php echo $user['details'] ?></a>
                            </div>
                        </div>
                        
                    <?php
                        }
                    ?>
                    </div>
                        
                </div>
            </div>
    </section>


    <section class="news">
    <div news class="container-news">
                <div class="news-con">
                    <div class="news-info">
                        อัพเดตข้อมูลเกมมาใหม่!
                    </div>

                    <div class="news-table">
                        
                    
                    <?php
                        $stml = $conn->query("SELECT * FROM gamenews"); 
                        $stml->execute();

                        $gamenews = $stml->fetchAll();
                        foreach ($gamenews as $user) {
                    ?>
                        <div class="news-box">
                            
                        <td width="20px"><img class="rounded" width="100%" src="uploads/<?php echo $user['img']; ?>" alt=""></td>
                        <h3><?php echo $user['fname'] ?></h3>
                            <div class="news-box-title">
                                <a href="#"><?php echo $user['details'] ?></a>
                            </div>
                        </div>
                        
                    <?php
                        }
                    ?>
                    </div>
                        
                </div>
            </div>
    </section>

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



        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

        <script>
            $(document).ready(function() {
                $('#logout').on('click', function(e) {
                    e.preventDefault(); // Prevent default anchor behavior
                    
                    // Send AJAX request to logout the user
                    $.ajax({
                        url: 'logout.php',
                        type: 'POST',
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'success') {
                                // Redirect to login page or home page
                                window.location.href = 'login.php'; // Redirect to login or home page
                            }
                        },
                        error: function(response) {
                            console.log(response);
                        }
                    });
                });
            });
        </script>

</body>
</html>