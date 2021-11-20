<!DOCTYPE html>
<html>
<head>
	<title>Form Example 2</title>
</head>
<body>
	<?php
		if(!isset($_POST['submit']))
		{
	?>

	<form action="Subrian_MarkLloyd_form2.php" method="post">
	Enter your favorite country?: <input type="text" name="city">
	<input type="submit" name="submit">
	</form>
		

	<?php
		}
		else
		{
			echo "Your favorite city is {$_POST['city']}";
		}	
	?>	

</body>
</html>