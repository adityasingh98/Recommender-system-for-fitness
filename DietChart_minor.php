<!doctype html>
<html>
	<head>
	<title>
	  Diet Chart
	</title>
	<style>
		.abc{
		   background-color:#ebebe0;
		    padding:5px;
			margin:10px;
		}
		
		.abd{
		   background-color:#ffeee6;
		   padding:5px;
		   margin:10px;
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
		<p><strong>Diet Plan and Exercise Routine<strong></p>
		</div>
		<div class="abc">
			<ul>
			<?php
			include 'connection.php';
if(isset($_POST['diet'])){
$loose= $_POST['loose'];
$sql ="SELECT details FROM diet WHERE loose='$loose' and type='0'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
       echo '<li>'.$row['details'].'</li>';	
	} } ?>
			</ul>
		</div>
		
		<div class="abd">
			<ul>
			
			<?php
			$sql ="SELECT details FROM diet WHERE loose='$loose' and type='1'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
       echo '<li>'.$row['details'].'</li>';	
} } }?>
			</ul>
		</div>
	</body>
</html>