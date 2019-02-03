
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

//STEP 2: establish database connection

$con=mysqli_connect("localhost","root","");
//STEP 3: database selection
if($con){
mysqli_select_db($con,"todo");
//STEP 4: Database interaction
$sql = "INSERT INTO userdb(name,surname,birthdate,city,mail,password
) VALUES('$name','$surname','$birthdate','$city','$mail','$password')";

if(mysqli_query($con,$sql)){
	echo "<center><h3>Account created  Successfully!</h3></center>";
	
    mysqli_close($con);
}
else {
	echo "An error occured.";
}

}
else 
echo "Unable to establish database connection";

?>





</body>
</html>