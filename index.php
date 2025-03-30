<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="wrapper.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

	<link href="jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen"/>
	<script src="js/jquery-1.9.1.min.js"></script>
	<?php include('config/db.php'); ?>
</head>

<body>
    <div class="wrapper-login">
	   <form id="login_form"  method="post">
       <h1>Login</h1>
       <div class="input-box">
        <label for="">Username</label><br/>
        <input type="text"  id="username" name="username" placeholder="Username" required><br><br>
        </div>

        <div class="input-box">
        <label for="">Password</label><br/>
        <input type="password" id="password" name="password" placeholder="Password" required><br><br>
        </div>
        <button name="login" type="submit" class="btn">Sign in</button>
		</form>
    </div>
				<script>
			jQuery(document).ready(function(){
			jQuery("#login_form").submit(function(e){
					e.preventDefault();
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "login.php",
						data: formData,
						success: function(html){
						if(html=='true')
						{
						$.jGrowl("Welcome Back!", { header: 'Access Granted' });
						var delay = 2000;
							setTimeout(function(){ window.location = 'home.php'  }, delay);  
						}
						else
						{
						$.jGrowl("Please Check your username and Password", { header: 'Login Failed' });
						}
						}
						
					});
					return false;
				});
			});
			</script>  

  
  
		</div>
		</div><!--form-->
		
		<br><br>
		
		
		<div class="wrapper-regis">
        <h3>Register here</h3>

			<form method="POST" action="signup.php" id="signup">
            <div class="input-box">
        		<label for="">Username</label><br/>
				<input type="text" name="username" Placeholder="Username here.."><br /><br />
            </div>
            <div class="input-box">
        		<label for="">Password</label><br/>
				<input type="password" name="password" Placeholder="Password here.."><br /><br />
            </div>
            <div class="input-box">
        		<label for="">First Name</label><br/>
				<input type="text" name="firstname" Placeholder="First Name here.."><br /><br />
            </div>
            <div class="input-box">
        		<label for="">Last Name</label><br/>
				<input type="text" name="lastname" Placeholder="Last Name here.."><br /><br><br />
            </div>
				<input type="submit" name="save" class="btn" value="Save">
			</form>
            </div>
			
<br>
</center>
<?php include('scripts.php');?>

</body>
</html>