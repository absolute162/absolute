<?php 

require_once 'config/db.php';
include('session.php');

    require_once 'config.php';

    if (isset($_POST['submit'])) {
        $fName = $_POST['search'];

        $sql = "SELECT * FROM mmorpg WHERE fname = :fname";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['fname' => $fName]);
        $row = $stmt->fetch();
    } else {
        header("location: mmorpg.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mmorpg</title>
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

    <section class="news">
            <div news class="container-news">
                <div class="news-con">
                <div class="container">
        <div class="row mt-4">
            <div class="col-md-8 mx-auto bg-light rounded p-4">
                <h5 class="text-center font-weight-bold">MMORPG</h5>
                
                <form action="mmorpgdetails.php" method="POST" class="p-3" style="position: relative;">
                    <div class="input-group">
                        <input type="text" name="search" id="search" class="form-control form-control-lg border-info rounded-0" placeholder="ค้นหา..." autocomplete="off" required>
                        <div class="input-group-append">
                            <input type="submit" name="submit" value="ค้นหา" class="btn btn-info btn-lg rounded-0">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="list-group" id="show-list"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
                    <div class="news-table">
                    
                        
                    
                    
                        <div class="news-box">
                            
                        <td width="20px"><img class="rounded" width="100%" src="uploads/<?= $row['img'] ?>" alt=""></td>
                        <h3><?= $row['fname'] ?> </h3>
                            <div class="news-box-title">
                                <a href="newsdetailsitem.php"><?= $row['details'] ?></a>
                            </div>
                        </div>
                        
                    </div>
                        
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
                        <li><a href="home.php">ข้อมูลการเล่น</a></li>
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


    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="js/mmorpg.js"></script>

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