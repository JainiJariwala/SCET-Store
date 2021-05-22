  <?php      
	function redirect($new_location)
	{
		header("Location: ".$new_location);
		exit;
	
	}	


    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "record";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    } 
    $username = $_POST['username'];  
    $password = str_rot13($_POST['pass']); 
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($con, $username);  
    $password = mysqli_real_escape_string($con, $password);  

    $sql = "select *from register where email = '$username' and password = '$password'";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);     
	$count = mysqli_num_rows($result);   
    if($count == 1){
        //echo "login successful";  
	    redirect('book.html');
    }  
    else{
        echo ("<script LANGUAGE='JavaScript'>
    	window.alert('Invalid username or password');
    	window.location.href='login.html';
    	</script>");
        //echo "login unsuccessful";  
	    //redirect('login_unsuccessfull.html');
    }     
 
?>  