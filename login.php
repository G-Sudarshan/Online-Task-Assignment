<?php

session_start()

?><!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>
<?php

//STEP 1 : read variables

$mail=$_POST['mail'];
$password=$_POST['password'];

//STEP 2 : establish database connection

$con=mysqli_connect("localhost","root","");

// STEP 3 : Database intraction

if($con){
mysqli_select_db($con,"todo");

$sql="SELECT * FROM userdb where mail='$mail'";

if(mysqli_query($con,$sql)){
	
	$result=mysqli_query($con,$sql);
	if (!$result){
    die(" Something went wrong");
}
if (mysqli_num_rows($result)==1){
    $row = mysqli_fetch_array($result);
    if($row['password']==$password){
    	
    	$_SESSION['uid']=$row['uid'];
    	$_SESSION['name']=$row['name'];
    	$_SESSION['surname']=$row['surname'];
    	$_SESSION['birthdate']=$row['birthdate'];
    	$_SESSION['mail']=$row['mail'];
    	$_SESSION['mail']=$row['mail'];
    	echo "Log In Succesfull";
    	print_r($_SESSION);


   
    }
    else
    {
    	echo "Invalid password";

    	
    }

}
	else {
		echo "NO such user is registered.";
	
	}
	
		
	
	
	
    mysqli_close($con);
}
else {
	echo "An error occured.";
	}

}
else 
echo "Unable to establish database connection";

?>


?>
</body>
</html>