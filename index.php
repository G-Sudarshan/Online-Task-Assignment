<?php

if(isset($_SESSION['valid'])){
header("location: user.php");
die();
}
if(isset($_SESSION['adminvalid'])){
header("location: admin.php");
die();
}

?><!DOCTYPE html>
<html> 
<head>
	<title>Online Task Assignment</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		
</head>
<body background="bg1.jpg" text="white" style="color: white"; >
 
<table border='0' width='480px' cellpadding='0' cellspacing='0' align='center'>
<center><tr>
   <td><h1 style="color: white";>Online Task Assignment </h1></td>
</tr><center>
<form border=1px action="signup.php" method="POST">

<table border='0' width='480px' cellpadding='0' cellspacing='0' align='center'>
<tr>
    <td align='center'>Name:</td>
    <td><input type='text' name='name' id="uname"></td>
  <td><p id="p"></p>
</tr>
<tr> <td>&nbsp;</td> </tr>
<tr>
    <td align='center'>Sur Name:</td>
    <td><input type='text' name='surname'></td>
</tr>
<tr> <td>&nbsp;</td> </tr>
<tr>
    <td align='center'>Username:</td>
    <td><input type='text' name='username'></td>
</tr>
<tr> <td>&nbsp;</td> </tr>
<tr>
    <td align='center'>City:</td>
    <td><input type='text' name='city'></td>
</tr>
<tr> <td>&nbsp;</td> </tr>
<tr>
    <td align='center'>Email:</td>
    <td><input type='Email' name='mail'></td>
</tr>
<tr> <td>&nbsp;</td> </tr>
<tr>
    <td align='center'>Date Of Birth:</td>
    <td><input type='Date' name='birthdate'></td>
</tr>

<tr> <td>&nbsp;</td> </tr>
<tr>
    <td align='center'>New Passssword :</td>
    <td><input type='password' name='password'></td>
</tr>
<tr> <td>&nbsp;</td> </tr>
<table border='0' cellpadding='0' cellspacing='0' width='480px' align='center'>
<tr>
    <td align='center'><input id="sub" type='submit' name='REGISTER' value="create account" style="border-radius: 50%; height : 50px; background color: red; "></td>
</tr>
</table>
</table>
 
</table>

</form><center>
<a href="user_login.php" class="btn btn-success">Login as User</a>
<a href="admin_login.php" class="btn btn-primary">Login as Admin</a>
</body></center>
<script type="text/javascript">
	function validate() 
			{
					var ptrn = /^([^0-9\W]*)$/;
					
					if(ptrn.test(document.getElementById("uname").value))
					{
						document.getElementById("p").innerHTML ="user is valids";
						document.getElementById("p").style.color ='green';
						//document.getElementById("e").style.fontSize="20px";
						document.getElementById("sub").removeAttribute("disabled");
						var a = document.createAttribute("enabled");	
						document.getElementById("sub").setAttributeNode(a);

					} 
					else
					{
						document.getElementById("p").innerHTML =" user is in  valid";
						document.getElementById("p").style.color ='red';
						document.getElementById("sub").removeAttribute("enabled");
						var a = document.createAttribute("disabled");	
						document.getElementById("sub").setAttributeNode(a);
					}
					
				}

				document.getElementById("uname").addEventListener("keyup",validate);
</script>
</html>