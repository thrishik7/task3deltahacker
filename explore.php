<?php
session_start();
if(!isset($_SESSION['username']))
{

    $_SESSION['msg']="You must log in first to view this page";
    header("location : login1.php");
}

if(isset($_GET['logout']))
{
      
   
    unset($_SESSION['username']);
    session_destroy();
    header("location: login1.php");
}

?>
<?php

$errors = array();

$servername = "localhost";
$username = "root";
$password = "";
$usernamed= $_SESSION['username'];
// Create connection
$db = mysqli_connect($servername, $username, $password, $usernamed);
// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database











?>

<!--?php
 ini_set(display_errors',1);
 ?-->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" content="width=device-width, initial-scale=1" name="viewport"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="script.js"></script>
<link rel="stylesheet" href="style2.css">
<title>Home Page</title>
</head>
  <body>

  <form method="post" action="explore.php">
    <div class="formx">
<div class="row">
  <div class="col-sm-6">
  <?php if(isset($_SESSION['username'])) : ?>
  
      
  <h1>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h1>
	  <?php endif ?>
</div>
<div class="col-sm-6">
        <nav>
             <ul>

               <li ><a href="index.php">Home</a></li>
               <li><a href="form.php">Build Form</a></li>
              
               <li class="active"><a href="responsed.php">Responses</a></li>
               <li><a href="">Contact</a></li>
               <li> <a href="index.php?logout='1'">logout</a> </li>
            </ul>

        </nav>

</div>

</div> </div>


  <div class="row">
<div class="col-sm-4">
<div class="navform">
<nav>
             <ul>

               <li><a href="notification.php">Responses</a></li>
               <li ><a href="formc.php">forms Created</a></li>
               <li class="active"><a>explore</a></li>
           
            </ul>

        </nav>



</div>
</div>

<div class="col-sm-8">
   
<ul>
<?php 
           
           
           $usernamed= $_SESSION['username'];
           $db= mysqli_connect('localhost','root','','forms')or die("could not connect database..");
               $sql="SELECT * FROM `forms` WHERE NOT `username`='$usernamed'";
              $result=mysqli_query($db, $sql);


  ?>
     <?php while($row= mysqli_fetch_array($result)): ?>

     <div class="forms">
         <?php
         $k=0;
        $name= $row['forms'] ;
        $name1=$row['forms'].$k;
        echo "<button   name='$name' type='submit' >$name</button>";
        echo "by:";
        echo $row['username'];
        echo "<script> console.log('$name');</script>" ; 
        $db= mysqli_connect('localhost','root','', 'forms')or die("could not connect database..");
        
        $sql="SELECT time FROM $name WHERE NOT time='NULL'";
        $res=mysqli_query($db, $sql);
        if($res){
          $rowd=mysqli_fetch_array($res);
          $db= mysqli_connect('localhost','root','', 'forms')or die("could not connect database..");
        
          $sql="SELECT timc FROM $name WHERE NOT timc='NULL'";
          $res=mysqli_query($db, $sql);
          if($res){
            $rowt=mysqli_fetch_array($res);
          $duration=$rowd['time'];
          $date=$rowt['timc'];
          echo "<p id='$name' name='$name1'>";
        
       
          echo"</p> ";
        
        echo "<script> timer($duration,'$date','$name');</script>";
        
{   
         
}
        }}
?>
</div>
  <?php endwhile; ?>
</ul>

</div>
</div>
<?php
 $usernamed= $_SESSION['username'];
 $db= mysqli_connect('localhost','root','','forms')or die("could not connect database..");
     $sql="SELECT * FROM `forms`WHERE NOT `username`='$usernamed' ";
    $result=mysqli_query($db, $sql);


while($row= mysqli_fetch_array($result)){
  $k=0;
        $name= $row['forms'] ;
        $name1=$row['forms'].$k;
       $check ="<script>document.getElementById($name1).innerHTML = 'EXPIRED';</script>";
if((isset($_POST[$row['forms']])) && ($check==0) )

{    $db= mysqli_connect('localhost','root','','forms')or die("could not connect database..");
  $ref=$row['forms'];
  $adf=$row['username'];
  $_SESSION['admin']=$adf;
     $_SESSION['formname']= $row['forms'];
     $ch= $_SESSION['admin'];
     header("location: borm.php?ID=$ref");
}
}
?>

</form>
</body>
	  
	   </html>