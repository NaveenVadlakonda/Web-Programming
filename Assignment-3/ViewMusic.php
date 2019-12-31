<html>
<head>
<title>MyMusic-View</title>
<link rel="stylesheet" type="text/css" href="./style.css" title="style" />
</head>
<body background="./back.jpg">

<?php

function show_music()
{
 $servername = "localhost";
$username = "schinnapullaiah1";
$password = "schinnapullaiah1";
$dbname = "schinnapullaiah1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
	if ($conn->connect_error) 
	{
	
			echo "<script type='text/javascript'>alert('Connection failed')</script>"; 
	}
	
	$sql9 = "SELECT * FROM MyMusic";
	$result = $conn->query($sql9);
	echo "<br><table border='2'><tr><th colspan=\"2\">MyMusic </th></tr><tr><td>Artist</td><td>Album</td></tr>";
	if ($result->num_rows > 0) 
	{
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{
        echo "<tr><td>".$row["artist"]."</td><td>".$row["album"]."</td></tr>";
    }
	} 
	else 
	{
    echo  "<tr><th colspan=\"2\">0 results </th></tr>";
	}
    echo"<tr><td colspan=\"2\"><a href='./home.html'> Menu </a> &nbsp;&nbsp;
    <a href='./LoginForm.php'>Logout</a></td></tr>";
	echo "</table>";
	
	
	$conn->close();
		
}
?>

<h1><i>My Music</i></h1><br>

	<h2> Music Gallery </h2>
	<?php show_music() ?>

</body>
</html>