<html>
<head>
<title>MyMusic-Add</title>
<link rel="stylesheet" type="text/css" href="./style.css" title="style" />
</head>
<body background="./back.jpg">

<?php

function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

		
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

$artist= test_input($_POST["artist"]);
$album= test_input($_POST["album"]);

$servername = "localhost";
$username = "schinnapullaiah1";
$password = "schinnapullaiah1";
$dbname = "schinnapullaiah1";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
   echo "<script type='text/javascript'>alert('Cannot connect to server')</script>"; 
} 

$sql = "INSERT INTO MyMusic (artist, album)
VALUES ('".$artist."', '".$album."')";

if ($conn->query($sql) === TRUE) 
{
    echo "<script type='text/javascript'>alert('Data saved.')</script>"; 
}
else 
{
    echo "<script type='text/javascript'>alert('Failed: '". $conn->error.")</script>"; ;
}

$conn->close();
}
?>

<img src="./head.jpg" height="150" width="400" alt=""/>
<h2>Add Music to Library</h2>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<br><br><br><br><br><br><br>
		<table align="center">
			<tr>
				<td>Artist:</td>
				<td><input type="text" name="artist" required></td>
			</tr>
			<br>
			<tr>
				
				<td>Album:</td>
				<td><input type="text" name="album" required></td>
			</tr>
			<tr>
				<td> </td>
				<td><input type="submit" value="Add"></td>
			</tr>
			<tr>
				<td><a href="./home.html">Menu</a></td>
				<td><a href="./LoginForm.php">Logout</a></td>
			</tr>
			
		
	</form>

</body>
</html>