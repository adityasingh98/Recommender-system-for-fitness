<?php
include 'connection.php';
$er="none";
if(isset($_POST['sub'])){
$user= $_POST['user'];
	 $pass= $_POST['pwd'];
	 $sql ="SELECT count(*) FROM user WHERE username ='$user' and password='$pass'";
	$result = $conn->query($sql);
	if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
       //$_SESSION['email']=$email;
	    $_SESSION['user']=$user;
header('location:AI_PROJECT.php');		
}else{
	$er="block";
}

}
	
?>

<!doctype html>
<html>
	<head>
	<title>login</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
	
	#button{
	  margin-left:620px;
	  margin-right:450px;
	}
	  #from1{
	margin-top:40px;
	background-color:#e6e6ff;
    }
.form-group{
	padding-right:400px;
	padding-left:400px;
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
	<div id="tellus">
		<p><strong>Login<strong></p>
		</div>
	    <form id="form1" method="POST" action="AI_login.php">
		<div class="alert alert-danger" style="display:<?php echo $er;?>;">
         <strong>Wrong username or password</strong>
	  </div>
    <div class="form-group">
      <label for="usr">Username:</label>
      <input type="text" class="form-control" id="usr" name="user">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pwd">
    </div>
			<div id="button">
		<button type="submit" class="btn btn-primary btn-lg" name="sub">Login</button>
		</div>
	
  </form>
  </div>

		
  
	</body>
</html>