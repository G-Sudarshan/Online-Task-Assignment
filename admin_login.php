<!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
		<title>Admin login</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="loginBox">
			<img src="p6.jpg" class="user">
			<h2>Login as Admin</h2>
			<form action="admin_login1.php" method="POST">
				<p id="uv"></p><br><br> 
				<p>username</p>
				<input type='text' name='username' id="user" style="width: 240px; border-radius: 10%; height: 30px;">
				<p>Password</p>
				<input type="password" name="password"  id="pass"  placeholder="" id="pword">
				<input type="submit" name="" value="Sign In" >

				
			</form>
			
		</div>
		<script type="text/javascript">
			function valename() 
{
	len=document.getElementById('user').value;
	if ((len.length < 5) || (len.length > 10))
	 {
                	document.getElementById("uv").innerHTML ="invalid username";
						document.getElementById("uv").style.color ='red' ;
						
						document.getElementById("sub").removeAttribute("disabled");
						var a = document.createAttribute("enabled");	
						document.getElementById("sub").setAttributeNode(a);
                }
                else
					{
						document.getElementById("uv").innerHTML ="";
						document.getElementById("uv").style.color ='red';
						document.getElementById("sub").removeAttribute("enabled");
						var a = document.createAttribute("disabled");	
						document.getElementById("sub").setAttributeNode(a);
					}

}
document.getElementById("user").addEventListener("keyup",valename);	
function valpass()
			{

                var b;
                b = document.getElementById("pass").value;
                if(b == "")
                {
                	document.getElementById("uv").innerHTML ="";
						document.getElementById("uv").style.color ='red' ;
						
						document.getElementById("sub").removeAttribute("enabled");
						var a = document.createAttribute("enabled");	
						document.getElementById("sub").setAttributeNode(a);
                }
                else if ((b.length < 7) || (b.length > 15))
                {
                	document.getElementById("uv").innerHTML ="invalid password";
						document.getElementById("uv").style.color ='red' ;
						
						document.getElementById("sub").removeAttribute("disabled");
						var a = document.createAttribute("enabled");	
						document.getElementById("sub").setAttributeNode(a);
                }
                else
					{
						document.getElementById("uv").innerHTML ="";
						document.getElementById("uv").style.color ='red';
						document.getElementById("sub").removeAttribute("enabled");
						var a = document.createAttribute("disabled");	
						document.getElementById("sub").setAttributeNode(a);
					}

			}

			
			document.getElementById("pass").addEventListener("keyup",valpass);	
		</script>
	

</body></html>