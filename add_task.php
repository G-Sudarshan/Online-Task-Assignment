<?php
  
  session_start();

if (!isset($_SESSION['adminvalid'])) { //not logged in

    //redirect to homepage
    header('Location: index.php');
    die();
  }


?>
<!DOCTYPE html> 
<html>
<head>
	<title>Adding Activity</title>
</head>
<body>

<?php

$title=$_POST['title'];
$task_user=$_POST['username'];
$deadline=$_POST['deadline'];
$body=$_POST['body'];
$task_admin=$_SESSION['username'];
$admin_uid=$_SESSION['uid'];

//get uid of task_user from database

$con=mysqli_connect("sql113.epizy.com","epiz_23532514","h7cUD9bCQ7XFv");

if($con){
mysqli_select_db($con,"epiz_23532514_todo");

$sql="SELECT uid FROM userdb where username='$task_user'";

if(mysqli_query($con,$sql)){
	
	$result=mysqli_query($con,$sql);
	if (!$result){
    die(" Something went wrong");
}
if (mysqli_num_rows($result)==1){
    $row = mysqli_fetch_array($result);
    
    	
    	$user_uid=$row['uid'];
    
    }

    $sqladd = "INSERT INTO tasks(title,  task_user, task_admin, deadline, body, user_uid, admin_uid) VALUES('$title','$task_user','$task_admin','$deadline','$body','$user_uid','$admin_uid')";

    mysqli_select_db($con,"epiz_23532514_todo");

    if(mysqli_query($con,$sqladd)){
	
	echo "task added successfully";

     mysqli_close($con);
}

}
}


?>
</body>
</html>