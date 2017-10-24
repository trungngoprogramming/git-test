<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
       <?php 
       if (isset($_SESSION['username']) && $_SESSION['username']){
           echo 'B?n ð? ðãng nh?p v?i tên là '.$_SESSION['username']."<br/>";
           echo 'Click vào ðây ð? <a href="logout.php">Logout</a>';
       }
       else{
           echo 'B?n chýa ðãng nh?p';
       }
       ?>
    </body>
</html>