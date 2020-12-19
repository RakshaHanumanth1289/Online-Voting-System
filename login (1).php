<?php
session_start();
include("connect.php");
              // username and password
              $useremail=$_POST['useremail']; 
              $password=$_POST['password']; 
              $password1=md5($_POST['password']); 
			  
              //admin Login
			  $_SESSION['email']=$useremail;// session Email
			  $sqlp="SELECT * FROM admin WHERE adminEmail='$useremail' and adminPassword ='$password'";
              $resultp=mysqli_query($conn,$sqlp);
              $count=mysqli_num_rows($resultp);
              if($count>0)
      
				   {
           /*echo "<script language=\"JavaScript\">\n";
                   echo "window.location='../Admin/index.php'";
                   echo "</script>";*/

                      header("Location: ../Admin/index.php");// to Admin Homepage
                    }
                    else
                 {
          
                   echo "<script language=\"JavaScript\">\n";
                   echo "alert('Invalid Username or password');\n";
                   echo "window.location='index.php.'";
                   echo "</script>"; 
                 }
			  
        $sqlp1="SELECT * FROM user WHERE Useremail='$useremail' and Userpassword='$password1'";
        
           $resultp1=mysqli_query($conn,$sqlp1);
              $count1=mysqli_num_rows($resultp1);
              if($count1>0)
              {
                 header("Location: ../User/index.php");// to user homepage
              }
              else
                 {
          
                   echo "<script language=\"JavaScript\">\n";
                   echo "alert('Invalid Username or password');\n";
                   echo "window.location='index.php.'";
                   echo "</script>"; 
                 }

        $sqlp2="SELECT * FROM volunteer WHERE volunteerEmail='$useremail' and volunteerPassword='$password1'";
        
            $resultp2=mysqli_query($conn,$sqlp2);
            $count2=mysqli_num_rows($resultp2);
              if($count2>0)
              {
                 header("Location: ../volunteer/index.php");// to user homepage
              }
              else
                 {
          
                   echo "<script language=\"JavaScript\">\n";
                   echo "alert('Invalid Username or password');\n";
                   echo "window.location='index.php.'";
                   echo "</script>"; 
                 }

          $sqlp3="SELECT * FROM ngo WHERE ngoEmail='$useremail' and ngoPass='$password1'";
        
           $resultp3=mysqli_query($conn,$sqlp3);
              $count3=mysqli_num_rows($resultp3);
              if($count3>0)
              {
                 header("Location: ../ngo/index.php");// to user homepage
              }
              else
                 {
          
                   echo "<script language=\"JavaScript\">\n";
                   echo "alert('Invalid Username or password');\n";
                   echo "window.location='index.php.'";
                   echo "</script>"; 
                 }
        ?>

 