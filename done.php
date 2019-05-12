<?php

$task_id=$_POST['task_id'];

       //1. Establish Connection
    $con=mysqli_connect("sql113.epizy.com","epiz_23532514","h7cUD9bCQ7XFv");
      //2.select database
      if($con){
        mysqli_select_db($con,"epiz_23532514_todo");
        //3.query writing
        $sql="SELECT * FROM tasks where task_id = '$task_id' ";
        //4.query execution
        if(mysqli_query($con,$sql)){
  
         $result = mysqli_query($con,$sql);
         $row = mysqli_fetch_array($result);

         $task_id=$row['task_id'];
         $title  =$row['title'];
         $admin_uid=$row['admin_uid']; 
         $user_uid=$row['user_uid'];
         $body=$row['body'];
         $admin=$row['task_admin'];
         $user=$row['task_user'];

         $sqldone = "INSERT INTO completed_tasks(task_id,title,user, admin, body, user_uid, admin_uid) VALUES('$task_id','$title','$user','$admin','$body','$user_uid','$admin_uid')";

         if(mysqli_query($con,$sqldone))
         {
          echo "query fired";

          $sqldelete = "DELETE FROM tasks WHERE task_id='$task_id'";
          if(mysqli_query($con,$sqldelete))
          {
            header('Location: user.php');
          }
          else
          {
            echo "delete query didnt fire";
          }

        }
        else
        {
          echo "sqldoneq query didnt run";
        }





         //echo $row['task_id'];

         //print_r($row);



       }
       else
       {
        echo "query not fired";
       }
     }




      ?>
