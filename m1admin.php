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
<title>Admin Panel</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "verdana", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Page Container -->
<nav class="navbar navbar-inverse">
  <div class="navb">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">To Do List</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="admin.php">Home</a></li>
      <li><a href="about_us.html">About</a></li>
      
      <li><a href="#">Contact</a></li>
      <li><form method="POST" action="m1admin.php">
    <button type="submit" class="btn btn-primary">My Completed Tasks</button></form></li>
<li><form method="POST" action="lt.php">
    <button type="submit" class="btn btn-danger">Logout</button>
</form></li>
</ul>
    
  </div>
</nav>
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <img src="a2.jpg" style="width:100%">
          <div class="w3-display-bottomleft w3-container w3-text-black">
          </div>
        </div>
        <br>
        <div class="w3-container">
          <p><b><h5>Name : <?php echo $_SESSION['name']." ". $_SESSION['surname']; ?></h4></b></p>
            <p><b><h6>username : <?php echo $_SESSION['username']; ?></h6></b></p>
          <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>Profession: Designer</p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>Address : GP Nashik</p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>Email : <?php echo $_SESSION['mail']; ?></p>
          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>Mobile no. : 7865231489</p>
          <hr><br><br>
          <br>
        </div>
      </div>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
    
      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Admin's Panel</h>
          <h3 class="w3-text-grey w3-padding-16">My completed tasks :- </h3>
          <table class="table table-striped">
    <thead>
      <tr>
        <th>Sr no.</th>
        <th>Task Name:</th>
        <th>Task Assigned to.</th>
        <th>Description</th>
        <th>Completed on</th>
        
        
      </tr>
    </thead>
    <tbody>
      <?php

      $user_uid=$_SESSION['uid'];
      //1. Establish Connection
     $con=mysqli_connect("sql113.epizy.com","epiz_23532514","h7cUD9bCQ7XFv");
      //2.select database
      if($con){
        mysqli_select_db($con,"epiz_23532514_todo");
        //3.query writing
        $sql="SELECT * FROM completed_tasks where admin_uid='$user_uid'";
        //4.query execution
        if(mysqli_query($con,$sql)){
  
         $records=mysqli_query($con,$sql);
         if (!$records){
         die(" Somethin0g went wrong");
       }

       $count=0;
     $projects = array();
    while ($project =  mysqli_fetch_assoc($records))
    {
        $projects[] = $project;
    }
    foreach ($projects as $project)
    {
?>
    <tr>
        <td><?php echo ++$count; ?></td>
        <td><?php echo $project['title']; ?></td>
        <td><?php echo $project['user']; ?></td>
        <td><?php echo $project['body']; ?></td>
        <td><?php echo $project['completed_on']; ?></td>
        
        
    </tr>
<?php
    }
  }
}
mysqli_close($con);?>
    </tbody>
  </table>
  <br>
  <br>      
      </div>

      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  <br>
  <div class="w3-full"><div class="w3-container w3-card w3-white w3-margin-bottom"><div class="container">
  <h2>Add Activity</h2>
  <br>
  <form class="form-horizontal" action="add_task.php" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="">Title:</label>
      <div class="col-sm-4">
        <input type="title" class="form-control" id="title" placeholder="Enter Title" name="title">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="">Task Assigned to:</label>
      <div class="col-sm-4">
        <input type="name" class="form-control" id="name" placeholder="User name:" name="username">
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="">Deadline:</label>
      <div class="col-sm-4">
        <input type="date" class="form-control" id="email" placeholder="Enter Deadline" name="deadline">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="">Description:</label>
      <div class="col-sm-10">
        <class="form-control" id="email" placeholder="Enter Description" name="Description"><textarea name="body" rows="5" cols="35"></textarea>
      </div>
    </div>
    
    
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>
</div>
</div>
  <!-- End Page Container -->
</div>

<footer class="w3-container w3-teal w3-center w3-margin-top">
  <p>Connect to us on social Media</p>
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <p>By Cm 2nd Year</p>
</footer>

</body>
</html>
