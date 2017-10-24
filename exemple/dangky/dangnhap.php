<?php
//Khai b�o s? d?ng session
session_start();
 
//Khai b�o utf-8 �? hi?n th? ��?c ti?ng vi?t
header('Content-Type: text/html; charset=UTF-8');
 
//X? l? ��ng nh?p
if (isset($_POST['dangnhap'])) 
{
    //K?t n?i t?i database
    include('ketnoi.php');
     
    //L?y d? li?u nh?p v�o
    $username = addslashes($_POST['txtUsername']);
    $password = addslashes($_POST['txtPassword']);
     
    //Ki?m tra �? nh?p �? t�n ��ng nh?p v?i m?t kh?u ch�a
    if (!$username || !$password) {
        echo "Vui l?ng nh?p �?y �? t�n ��ng nh?p v� m?t kh?u. <a href='javascript: history.go(-1)'>Tr? l?i</a>";
        exit;
    }
     
    // m? h�a pasword
    $password = md5($password);
     
    //Ki?m tra t�n ��ng nh?p c� t?n t?i kh�ng
    $query = mysql_query("SELECT username, password FROM member WHERE username='$username'");
    if (mysql_num_rows($query) == 0) {
        echo "T�n ��ng nh?p n�y kh�ng t?n t?i. Vui l?ng ki?m tra l?i. <a href='javascript: history.go(-1)'>Tr? l?i</a>";
        exit;
    }
     
    //L?y m?t kh?u trong database ra
    $row = mysql_fetch_array($query);
     
    //So s�nh 2 m?t kh?u c� tr�ng kh?p hay kh�ng
    if ($password != $row['password']) {
        echo "M?t kh?u kh�ng ��ng. Vui l?ng nh?p l?i. <a href='javascript: history.go(-1)'>Tr? l?i</a>";
        exit;
    }
     
    //L�u t�n ��ng nh?p
    $_SESSION['username'] = $username;
    echo "Xin ch�o " . $username . ". B?n �? ��ng nh?p th�nh c�ng. <a href='/'>V? trang ch?</a>";
    die();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <form action='dangnhap.php?do=login' method='POST'>
            <table cellpadding='0' cellspacing='0' border='1'>
                <tr>
                    <td>
                        T�n ��ng nh?p :
                    </td>
                    <td>
                        <input type='text' name='txtUsername' />
                    </td>
                </tr>
                <tr>
                    <td>
                        M?t kh?u :
                    </td>
                    <td>
                        <input type='password' name='txtPassword' />
                    </td>
                </tr>
            </table>
            <input type='submit' name="dangnhap" value='��ng nh?p' />
            <a href='dangky.php' title='��ng k?'>��ng k?</a>
        </form>
    </body>
</html>