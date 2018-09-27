<?php
	
	//define('DB_USER', "root");                 // Your database user name
	//define('DB_PASSWORD', "");				// Your database password (mention your db password here)
	//define('DB_DATABASE', "users");     		// Your database name
	//define('DB_SERVER', "localhost");			// db server (Mostly will be 'local' host)

    $con = mysqli_connect("localhost", "id6950394_ims", "rootroot", "id6950394_ims");
		
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$password = mysqli_real_escape_string($con, $_POST['password']); 
		
		$sql = "SELECT * FROM users WHERE username = '$username' && password = '$password'";
		
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
 
		// Check for successful execution of query
		if($count == 1)
		{
			
			$response = "success";
			echo $response;
			
		}
		else
		{
        
			$response = "failure";
			echo $response;
		}
	}
	else
	{
		// If required parameter is missing
		$response = "incomplete";

		echo $response;
	}
	
?>