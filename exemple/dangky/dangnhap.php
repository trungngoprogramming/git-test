<?php
//Khai báo s? d?ng session
session_start();
 
//Khai báo utf-8 ð? hi?n th? ðý?c ti?ng vi?t
header('Content-Type: text/html; charset=UTF-8');
 
//X? l? ðãng nh?p
if (isset($_POST['dangnhap'])) 
{
    //K?t n?i t?i database
    include('ketnoi.php');
     
    //L?y d? li?u nh?p vào
    $username = addslashes($_POST['txtUsername']);
    $password = addslashes($_POST['txtPassword']);
     
    //Ki?m tra ð? nh?p ð? tên ðãng nh?p v?i m?t kh?u chýa
    if (!$username || !$password) {
        echo "Vui l?ng nh?p ð?y ð? tên ðãng nh?p và m?t kh?u. <a href='javascript: history.go(-1)'>Tr? l?i</a>";
        exit;
    }
     
    // m? hóa pasword
    $password = md5($password);
     
    //Ki?m tra tên ðãng nh?p có t?n t?i không
    $query = mysql_query("SELECT username, password FROM member WHERE username='$username'");
    if (mysql_num_rows($query) == 0) {
        echo "Tên ðãng nh?p này không t?n t?i. Vui l?ng ki?m tra l?i. <a href='javascript: history.go(-1)'>Tr? l?i</a>";
        exit;
    }
     
    //L?y m?t kh?u trong database ra
    $row = mysql_fetch_array($query);
     
    //So sánh 2 m?t kh?u có trùng kh?p hay không
    if ($password != $row['password']) {
        echo "M?t kh?u không ðúng. Vui l?ng nh?p l?i. <a href='javascript: history.go(-1)'>Tr? l?i</a>";
        exit;
    }
     
    //Lýu tên ðãng nh?p
    $_SESSION['username'] = $username;
    echo "Xin chào " . $username . ". B?n ð? ðãng nh?p thành công. <a href='/'>V? trang ch?</a>";
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
                        Tên ðãng nh?p :
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
            <input type='submit' name="dangnhap" value='Ðãng nh?p' />
            <a href='dangky.php' title='Ðãng k?'>Ðãng k?</a>
        </form>
    </body>
</html>