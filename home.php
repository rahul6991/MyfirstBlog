<?php 

session_start();
include('conn.php');


$username=$_SESSION['name'];

 ?>



<html lang="en">
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style type="text/css"> 
		#head{
			background-color: cornflowerblue
			color:white;
		}
		hr{
			border:1px solid cornflowerblue;
		}
		#post{text-align:center;}
		#head{background-color: cornflowerblue;
				color:white;}
		#head2{text-align:right;}
		#img{height:150px;
			width:150px;
			border-radius: 100px;}
			#pro3{text-align:right;}

			input[type=submit]{
				background-color: cornflowerblue;
				height:20px;
				text-decoration: none;
				margin:4px 2px;
			}

			input[type=text]{
				border:2px solid cornflowerblue;
				text-decoration: none;
				margin:4px 2px;
			}
</style>	
<body>
	<div class="container-fluid">
		<div id="head" class="row">
		<div class="col-xs-6"> <h2>MY Blog</h2></div>	
		<div class="col-xs-6"><h3 style="color:red;"><?php  echo "$username" ?></h3></div>	

</div>
<br>
<div id="profile" class ="row">
	<div class="col-xs-2"><?php
	$username=$_SESSION['name'];
	
	$sql="SELECT * from signup WHERE name='$username'";
	$result=$conn->query($sql);
	if($result->num_rows > 0){
		while($row=$result->fetch_assoc()){
			$location = $row["image"];
			echo " <img id='img' src='$location'> ";
		}
	}else{
		echo "0 as results";
	}
	$conn->close();
	?>
</div>
<div id="pro2" class="col-xs-2">
	<?php 
	include('conn.php');

	$username=$_SESSION['name'];
	if(isset($_POST['submit']))
	{

		$name=$_FILES['myfile']['name'];
		$tmp_name=$_FILES['myfile']['tmp_name'];

		if($name){
			$location="/Applications/XAMPP/xamppfiles/htdocs/Myblog/image/$name";
			move_uploaded_file($name,$location);

			$query=mysqli_query($conn , "UPDATE signup SET image='$location' WHERE name='$username'");
			die("Uploaded!<a href='home.php'>Home</a>");
		}else
		 die("Please Select a file");
	}

	echo "<br>";
	echo "<form action='home.php' method='post' enctype='multipart/form-data'>
	<input type='file' name='myfile' >
	<input type='submit' name='submit' value='change your avtar'>
	</form> " ; 
	?>
</div>

<div id="pro3" class="col-xs-8"><a href="logout.php">LOGOUT</a></div>
</div>
<hr>
<div id="post" class="row">
	<div class="col-xs-12">
		<form method="post" action="post.php">
			<input type="text" name="title" placeholder="title..." >
			<input type="text" name="des" placeholder="Describe..." >
			<input type="submit" value="post">
		</form>
	</div>
	
</div>
<hr>
<div id="body" class="row">
	<div class="col-xs-12">
		<?php $sql="SELECT * FROM posts ORDER by id desc";
			$result = $conn->query($sql);
			if($result->num_rows > 0){

				while($row =$result->fetch_assoc()){
					echo "<br>"."Title:".$row["title"]."<br>"."<br>".$row["post"]."<br>"."<i>Posted By--</i><br>"."<br>".$row["name"]."</br>"."<br>".$row["time"]."</br>";
					echo "<hr>";
					echo "<br>";
				}
			}else{
				echo "0 results";
			}
			$conn->close();
		 ?>
	</div>
</div>

</div>
	
</body>
</html>