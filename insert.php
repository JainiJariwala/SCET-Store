<!DOCTYPE html>
<html>
<head>
	<title>Insert Page page</title>
</head>
<body>
	<center>
		<?php
		function redirect($new_location)
		{
			header("Location: ".$new_location);
			exit;
		
		}
		// servername => localhost
		// username => root
		// password => empty
		// database name => stident_login
		$conn = mysqli_connect("localhost", "root", "", "record");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 2 values from the form data(input)
		$first_name = $_REQUEST['fname'];
		$last_name = $_REQUEST['lname'];
		$email = $_REQUEST['username'];
		$password = str_rot13($_REQUEST['pass']);
		$con_password = str_rot13($_REQUEST['confirm-pass']);
		
		// Performing insert query execution
		// here our table name is college

		$user = $_POST['username'];  
	        $sql = "select * from register where email = '$user'";  
        	$result = mysqli_query($conn, $sql);  
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        	$count = mysqli_num_rows($result);

	if($count == 0)
	{	     

		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO register VALUES ('$first_name','$last_name','$email','$password','$con_password')";
		
		if(mysqli_query($conn, $sql)){
			echo ("<script LANGUAGE='JavaScript'>
    		window.location.href='book.html';
    		</script>");

			
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
	}
	else
		echo ("<script LANGUAGE='JavaScript'>
    	window.alert('User already exist');
    	window.location.href='login.html';
    	</script>");
		?>
	</center>
</body>

</html>
