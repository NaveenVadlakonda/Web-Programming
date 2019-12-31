<html>
<head>
<title>MyMusic-Login</title>
<link rel="stylesheet" type="text/css" href="./style.css" title="style" />
</head>
<body background="./back.jpg">

<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

		
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$uid= test_input($_POST["uid"]);
$pwd= test_input($_POST["pwd"]);

$servername = "localhost";
$username = "schinnapullaiah1";
$password = "schinnapullaiah1";
$dbname = "schinnapullaiah1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   echo "<script type='text/javascript'>alert('Cannot connect to server')</script>"; 
} 

$sql = "SELECT * FROM login_id";
$result = $conn->query($sql);
$c=0;
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{
		
		if($row["username"] == $uid)
		{
			if($row["password"] == $pwd)
			{
					
					header("Location: ./home.html");
					
			}
			else
			{
					echo "<script type='text/javascript'>alert('Incorrect Password. Please enter correct password! ')</script>"; 
					$c=1;
					break;
			}
		}
		
    }
	if($c==0)
		echo "<script type='text/javascript'>alert('Incorret username or password.')</script>";
} else 
{
    echo "<script type='text/javascript'>alert('No User Found.')</script>";
}
$conn->close();
}

?>
<img src="./head.jpg" height="150" width="400" alt=""/>
    <h2>User Login Form</h2>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<br><br>
		<table align="center">
			<tr>
				<td>Username:</td>
				<td><input type="text" name="uid" required></td>
			</tr>
			<br>
			<tr>
				
				<td>Password:</td>
				<td><input type="password" name="pwd" required></td>
			</tr>
			<tr>
				<td> </td>
				<td><input type="submit" value="submit"></td>
			</tr>
			<tr>
				<td> </td>
				<td><a href="./RegisterForm.php">Register</a></td>
			</tr>
		</table>	
		
	</form>

</body>
</html>