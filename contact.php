<?php include('config/db.php'); ?>
	<?php include('session.php'); ?>


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
    <link rel="stylesheet" href="wrapperre.css">
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

	<div class="content">

		<br>
		WELCOME!
			<a href="logout.php">
				<button><?php echo $member_row['firstname']." ".$member_row['lastname']; ?> - Log Out</button>
			</a>
			
		<br>
		<br>
		
					<form method="post"> 
					<textarea name="post_content" rows="7" cols="64" style="" placeholder="......... เขียนบางอย่าง........" required></textarea>
					<br>
					<button name="post">&nbsp;โพสต์</button>
					<br>
					<hr>
					</form>
						<?php	
							$query = mysqli_query($conn,"SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent from post LEFT JOIN user on user.user_id = post.user_id order by post_id DESC")or die(mysqli_error());
							while($post_row=mysqli_fetch_array($query)){
							$id = $post_row['post_id'];	
							$upid = $post_row['user_id'];	
							$posted_by = $post_row['firstname']." ".$post_row['lastname'];
						?>
					
					<h3>โพสต์โดย: <a href="#"> <?php echo $posted_by; ?></a>
					-
						<?php				
								$days = floor($post_row['TimeSpent'] / (60 * 60 * 24));
								$remainder = $post_row['TimeSpent'] % (60 * 60 * 24);
								$hours = floor($remainder / (60 * 60));
								$remainder = $remainder % (60 * 60);
								$minutes = floor($remainder / 60);
								$seconds = $remainder % 60;
								if($days > 0)
								echo date('F d, Y - H:i:sa', $post_row['date_created']);
								elseif($days == 0 && $hours == 0 && $minutes == 0)
								echo "A few seconds ago";		
								elseif($days == 0 && $hours == 0)
								echo $minutes.' minutes ago';
						?>
					<br>
					<br><?php echo $post_row['content']; ?></h3>
					<form method="post">
					<hr>
					คอมเมนต์:<br>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<textarea name="comment_content" rows="2" cols="44" style="" placeholder=".........คอมเมนต์........" required></textarea><br>
					<button type="submit" name="comment">ส่ง</button>
					</form>
						
					</br>
					</div>
					
					<div class="content">
					
				
							<?php 
								$comment_query = mysqli_query($conn,"SELECT * ,UNIX_TIMESTAMP() - date_posted AS TimeSpent FROM comment LEFT JOIN user on user.user_id = comment.user_id where post_id = '$id'") or die (mysqli_error());
								while ($comment_row=mysqli_fetch_array($comment_query)){
								$comment_id = $comment_row['comment_id'];
								$comment_by = $comment_row['firstname']." ".  $comment_row['lastname'];
							?>
					<br><a href="#"><?php echo $comment_by; ?></a> - <?php echo $comment_row['content']; ?>
					</div>
					<div class="content">
					<br>
							<?php				
								$days = floor($comment_row['TimeSpent'] / (60 * 60 * 24));
								$remainder = $comment_row['TimeSpent'] % (60 * 60 * 24);
								$hours = floor($remainder / (60 * 60));
								$remainder = $remainder % (60 * 60);
								$minutes = floor($remainder / 60);
								$seconds = $remainder % 60;
								if($days > 0)
								echo date('F d, Y - H:i:sa', $comment_row['date_posted']);
								elseif($days == 0 && $hours == 0 && $minutes == 0)
								echo "A few seconds ago";		
								elseif($days == 0 && $hours == 0)
								echo $minutes.' minutes ago';
							?>
					<br>
							<?php
							}
							?>
					<hr
					&nbsp;
					<?php 
					if ($u_id = $id){
					?>
					
				
					
					<?php }else{ ?>
					
						
					<?php
					} } ?>
					
				
							<?php
								if (isset($_POST['post'])){
								$post_content  = $_POST['post_content'];
								
								mysqli_query($conn,"insert into post (content,date_created,user_id) values ('$post_content','".strtotime(date("Y-m-d h:i:sa"))."','$user_id') ")or die(mysqli_error());
								header('location:contact.php');
								}
							?>

							<?php
							
								if (isset($_POST['comment'])){
								$comment_content = $_POST['comment_content'];
								$post_id=$_POST['id'];
								
								mysqli_query($conn,"insert into comment (content,date_posted,user_id,post_id) values ('$comment_content','".strtotime(date("Y-m-d h:i:sa"))."','$user_id','$post_id')") or die (mysqli_error());
								header('location:contact.php');
								}
							?>
			
				
					
	

</body>
</html>