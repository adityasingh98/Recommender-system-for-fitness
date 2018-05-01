<?php
include 'connection.php';
$bmi="";
$weight1="";
$weight2="";
$weight3="";
$range="";
$loose="";
$redi="";
if(isset($_POST['first'])){
	 $user= $_POST['uname'];
	 $age= $_POST['age'];
	 $weight= $_POST['weight'];
	 $height= $_POST['height'];
	 $gender= $_POST['gender'];
	 $bmi=$weight /($height*$height);
	 $bmi=number_format((float)$bmi, 2, '.', '');

$ins="insert into person(name,age,weight,height,gender) values('$user','$age','$weight','$height','$gender')";
	 
	 
    if ($conn->query($ins) === TRUE){
    } else {
        header('location:AI_PROJECT.php');	
    }
	
	$sql ="SELECT weight1,weight2 FROM wrange WHERE height1 ='$height' or height2 ='$height' or height3 ='$height'";
	$result = $conn->query($sql);
	if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
       $weight1=$row['weight1'];	
	   $weight2=$row['weight2'];
	   $redi="DietChart_minor.php";
	   if($weight1>$weight){
		   $range="Underweight";
		   $weight3=$weight1-$weight;
		   $loose=-$weight3;
	   }else if($weight2<$weight){
		   $range="Overweight";
		   $weight3=$weight-$weight2;
		   $loose=$weight3;
	   }else{
		   $range="You are Fit";
		   $weight3=0;
		   $loose=0;
		   $redi="";
	   }
	}

}


?>
<! doctype html>
<html>
	<head>
	<title>BMI Page
	</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		.textbmi{
			font-family:Georgia;
			font-size:2.0em;
			text-align:center;
		}
		
		#notify{
			text-align:center;
			background-color:#ff471a;
			color:white;
			margin:5px;
			padding:20px;
		}
		#msg{
			padding:5px;
			background-color:#ff9900;
			margin-top:30px;
			margin-left:5px;
			color:white;
			padding-left:15px;
		}
		
		#str{
			font-size:2.0em;
		}
		.text{
		   font-family:Georgia;
		   text-align:center;
		   font-size:27px;
		}
		
		#abc{
			font-family:Georgia;
			color:#6a6a48;
			margin:5px;
			margin-top:30px;
		}
		
		#pqr{
		    margin:5px;
			text-align:center;
		}
	</style>
	</head>
	<body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<div id="Notify">
			<p class="textbmi">Your BMI:<span><?php echo$bmi; ?></span></p>
			<p>Ideal Weight Range:<span><?php echo$weight1.'-'.$weight2; ?> Kgs</span></p>
		</div>
		
		<div id="msg">
			<p><span><strong id="str"><?php echo$range; ?></strong><p>A little effort away from your ideal weight.</p></span></p>
		</div>
		
		<div class="text">
		   <p><strong>Based on your BMI,you're</strong></p>
		   <p><strong><span><?php echo$weight3; ?>.0 Kgs</span></strong></p>
		   <p><?php echo$range; ?></p>
		</div>
		
		<div id="abc">
		<p><strong>What is BMI?<strong></P>
		<p>Here we calculate the BMI (body mass index) using your height and weight,
		based on standards set specifically for Indian body type.BMI is only used as an approximate
		health indicator.The BMI is an attempt to quantify the amount of tissue mass (muscle, fat, and bone) in an individual, and then categorize
		that person as underweight, normal weight, overweight, or obese based on that value. 
		</p>
		</div>
		<div id="pqr">
		<form action="<?php echo$redi; ?>" method="POST">
		<input type="hidden" name="loose" value="<?php echo$loose; ?>">
		<button type="submit" class="btn btn-primary btn-lg"name="diet">Next</button>
		</form>
		</div>
	</body>
</html>