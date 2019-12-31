<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>TEXT EDITOR</title>  
	<style type="text/css">
	div {
		<?php
		if( isset($_POST['font_family']) )
		{
			$font_family = $_POST['font_family'];
			print "font: $font_family;\n";
		}
        if( isset($_POST['alignment']) ) 
		{   
			$falign = $_POST['alignment']; 
			if ($falign == "center")
				print "text-align: center;\n";
			if ($falign == "left")
				print "text-align: left;\n";
			if ($falign == "right")
				print "text-align: right;\n";
		}
		if( isset($_POST['font_color']) )
		{
			$fcolor = $_POST['font_color'];
			if ($fcolor == "Red")
				print "color: Red;\n";
			if ($fcolor == "Blue")
				print "color: blue;\n";
			if ($fcolor == "Green")
				print "color: green;\n";
			if ($fcolor == "Black")
				print "color: black;\n";
			if ($fcolor == "Yellow")
				print "color: yellow;\n";
		}
		if( isset($_POST['font_size']) )
		{
			$fsize = $_POST['font_size'];
			if($fsize =="10pt")
				print "font-size:10pt;\n";
			if($fsize =="20pt")
				print "font-size:20pt;\n";
			if($fsize =="30pt")
				print "font-size:30pt;\n";
			if($fsize =="40pt")
				print "font-size:40pt;\n";
			if($fsize =="50pt")
				print "font-size:50pt;\n";
		}
		if( isset($_POST['font_style']) ) 
		{
			$fstyle = $_POST['font_style']; 
			if ($fstyle == "Italic")
				print "font-style: Italic;\n";
			if ($font_style == "Bold")
				print "font-style: Bold;\n";
				}
        
		?>
	}
</style>
</head>

<body>
	<?php
	print "<div>";
	print htmlspecialchars($_POST['address']);
	print "</div>";
	?>
</body>
</html>