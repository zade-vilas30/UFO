<?php
include("include\db\connection.php");
include("isLoggedIn.php");
$userId = $_SESSION["UID"];
$name = '';
$picture ='';
$userInfo = mysqli_query($conn, "SELECT * FROM hackathon_users WHERE id='".$userId."'");
if (mysqli_num_rows($userInfo) > 0){
		$rowSelected   = mysqli_num_rows($userInfo);
		if ($rowSelected ) {
			while($row = mysqli_fetch_array($userInfo)) {
				$name = $row["name"];
				$picture = $row["password_image"];
				$email = $row["email"];
			}
		}
	}
?>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/set1.css">
<head>
<body class="dashboard-body">
<div class="welcome-img"></div>
<div class = "content">
<h3><?php echo "Welcome $name to the wonderful world of <em>UFO</em>. With advanced features of activating account and new login widgets, you will definitely have a great experience of using <em>UFO</em>."; ?></h3>
<div> <a id="wer" href="similar.php" class="similar-dashboard">Similar Faces</a></div>
<div><a id="logout_btn" href="logout.php">LogOut</a></div>
<table>
<tr>
<td>NAME</td><td><?php echo $name ?></td>
</tr>
<tr>
<td>EMAIL</td><td><?php echo $email ?></td>
</tr>
<tr>
<td>PICTURE</td><td style="background:url(<?php echo $picture ?>) no-repeat center; width: 320px; height: 240px;"></td>
</tr>
<table>
</div>
</body>
</html>