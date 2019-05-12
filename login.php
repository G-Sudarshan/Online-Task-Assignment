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

$username=$_POST['username'];
$password=$_POST['password'];

//STEP 2 : establish database connection

$con=mysqli_connect("sql113.epizy.com","epiz_23532514","h7cUD9bCQ7XFv");
// STEP 3 : Database intraction

if($con){
mysqli_select_db($con,"epiz_23532514_todo");

$sql="SELECT * FROM userdb where username='$username'";

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
        $_SESSION['city']=$row['city'];
        $_SESSION['username']=$row['username'];
         $_SESSION['valid'] = true;
    	
    	header('Location: user.php');


   
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