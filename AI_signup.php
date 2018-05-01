<?php
include 'connection.php';
$er="none";
if(isset($_POST['submit'])){
$user= $_POST['un'];
	 $email= $_POST['email'];
	 $pass= $_POST['pwd'];

$ins="insert into user(email,password,username) values('$email','$pass','$user')";
	 
	 
    if ($conn->query($ins) === TRUE){
		$_SESSION['email']=$email;
	    $_SESSION['user']=$user;
		
		header('location:AI_PROJECT.php');	
    } else {
        $er="block";
    }
}
?>

<!doctype html>
<html>
	<head>
	<title>Signup</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		.Form-group{
			padding-left:300px;
			padding-right:300px;
			
		}
		
		#from1{
	margin-top:40px;
	background-color:#e6e6ff;
    }
.form-group{
	padding-right:400px;
	padding-left:400px;

	
}	

#button{
	  margin-left:620px;
	  margin-right:450px;
	}

#tellus{
	text-align:center;
	margin-left:400px;
	margin-right:400px;
	margin-top:10px;
	margin-bottom:10px;
	background-color:#005ce6;
	padding:10px;
	font-family:Georgia;
	font-size:20px;
	color:#ffffff;
}
	</style>
	</head>
	<body>
	<div >
	
	<div id="tellus">
		<p><strong>Signup<strong></p>
		</div>
		<div class="alert alert-danger" style="display:<?php echo $er;?>;">
         <strong>Sorry Something went wrong Please try again</strong>
	  </div>
	    <form id="form1" method="POST" action="AI_signup.php">
    <div class="form-group">
      <label for="usr">Username:</label>
      <input type="text" class="form-control" id="usr" name="un">
    </div>
    <div class="form-group">
      <label for="pwd">Email:</label>
      <input type="text" class="form-control" id="pwd" name="email">
    </div>
	<div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pwd">
    </div>
	
  
  </div>
  </div>
		<div id="button">
		<button type="submit" class="btn btn-primary btn-lg" name="submit">Signup</button>
		</div>
		</form>
	</body>
</html>