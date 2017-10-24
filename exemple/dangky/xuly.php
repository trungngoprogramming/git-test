<?php
 
    // N?u không ph?i là s? ki?n ðãng k? th? không x? l?
    if (!isset($_POST['txtUsername'])){
        die('');
    }
     
    //Nhúng file k?t n?i v?i database
    include('ketnoi.php');
          
    //Khai báo utf-8 ð? hi?n th? ðý?c ti?ng vi?t
    header('Content-Type: text/html; charset=UTF-8');
          
    //L?y d? li?u t? file dangky.php
    $username   = addslashes($_POST['txtUsername']);
    $password   = addslashes($_POST['txtPassword']);
    $email      = addslashes($_POST['txtEmail']);
    $fullname   = addslashes($_POST['txtFullname']);
    $birthday   = addslashes($_POST['txtBirthday']);
    $sex        = addslashes($_POST['txtSex']);
          
    //Ki?m tra ngý?i dùng ð? nh?p li?u ð?y ð? chýa
    if (!$username || !$password || !$email || !$fullname || !$birthday || !$sex)
    {
        echo "Vui l?ng nh?p ð?y ð? thông tin. <a href='javascript: history.go(-1)'>Tr? l?i</a>";
        exit;
    }
          
        // M? khóa m?t kh?u
        $password = md5($password);
          
    //Ki?m tra tên ðãng nh?p này ð? có ngý?i dùng chýa
    if (mysql_num_rows(mysql_query("SELECT username FROM member WHERE username='$username'")) > 0){
        echo "Tên ðãng nh?p này ð? có ngý?i dùng. Vui l?ng ch?n tên ðãng nh?p khác. <a href='javascript: history.go(-1)'>Tr? l?i</a>";
        exit;
    }
          
    //Ki?m tra email có ðúng ð?nh d?ng hay không
    if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email))
    {
        echo "Email này không h?p l?. Vui long nh?p email khác. <a href='javascript: history.go(-1)'>Tr? l?i</a>";
        exit;
    }
          
    //Ki?m tra email ð? có ngý?i dùng chýa
    if (mysql_num_rows(mysql_query("SELECT email FROM member WHERE email='$email'")) > 0)
    {
        echo "Email này ð? có ngý?i dùng. Vui l?ng ch?n Email khác. <a href='javascript: history.go(-1)'>Tr? l?i</a>";
        exit;
    }
    //Ki?m tra d?ng nh?p vào c?a ngày sinh
    if (!ereg("^[0-9]+/[0-9]+/[0-9]{2,4}", $birthday))
    {
            echo "Ngày tháng nãm sinh không h?p l?. Vui long nh?p l?i. <a href='javascript: history.go(-1)'>Tr? l?i</a>";
            exit;
        }
          
    //Lýu thông tin thành viên vào b?ng
    @$addmember = mysql_query("
        INSERT INTO member (
            username,
            password,
            email,
            fullname,
            birthday,
            sex
        )
        VALUE (
            '{$username}',
            '{$password}',
            '{$email}',
            '{$fullname}',
            '{$birthday}',
            '{$sex}'
        )
    ");
                          
    //Thông báo quá tr?nh lýu
    if ($addmember)
        echo "Quá tr?nh ðãng k? thành công. <a href='/'>V? trang ch?</a>";
    else
        echo "Có l?i x?y ra trong quá tr?nh ðãng k?. <a href='dangky.php'>Th? l?i</a>";
?>