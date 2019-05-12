
<!DOCTYPE html>
<html>
<head>
	<title>signup</title>
</head>  
<body>

<?php

//STEP 1 : take all variables in php for database interaction

$name=$_POST['name'];
$surname=$_POST['surname'];
$birthdate=$_POST['birthdate'];
$city=$_POST['city'];
$mail=$_POST['mail'];
$password=$_POST['password'];
$username=$_POST['username'];

//STEP 2: establish database connection

$con=mysqli_connect("sql113.epizy.com","epiz_23532514","h7cUD9bCQ7XFv");
//STEP 3: database selection
if($con){
mysqli_select_db($con,"epiz_23532514_todo");
//STEP 4: Database interaction
$sql = "INSERT INTO userdb(name,surname,birthdate,city,mail,password,username
) VALUES('$name','$surname','$birthdate','$city','$mail','$password','$username')";

if(mysqli_query($con,$sql)){
	echo "<center><h3>Account created  Successfully! Please login on homepage of website</h3></center>";

	
    mysqli_close($con);
}
else {
	echo " Username or Email id already registred, please try with diffrent username or email id again.";
}

}
else 
echo "Unable to establish database connection";

?>





</body>
</html>