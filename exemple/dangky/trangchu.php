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
           echo 'B?n �? ��ng nh?p v?i t�n l� '.$_SESSION['username']."<br/>";
           echo 'Click v�o ��y �? <a href="logout.php">Logout</a>';
       }
       else{
           echo 'B?n ch�a ��ng nh?p';
       }
       ?>
    </body>
</html>