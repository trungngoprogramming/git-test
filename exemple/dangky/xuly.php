<?php
 
    // N?u kh�ng ph?i l� s? ki?n ��ng k? th? kh�ng x? l?
    if (!isset($_POST['txtUsername'])){
        die('');
    }
     
    //Nh�ng file k?t n?i v?i database
    include('ketnoi.php');
          
    //Khai b�o utf-8 �? hi?n th? ��?c ti?ng vi?t
    header('Content-Type: text/html; charset=UTF-8');
          
    //L?y d? li?u t? file dangky.php
    $username   = addslashes($_POST['txtUsername']);
    $password   = addslashes($_POST['txtPassword']);
    $email      = addslashes($_POST['txtEmail']);
    $fullname   = addslashes($_POST['txtFullname']);
    $birthday   = addslashes($_POST['txtBirthday']);
    $sex        = addslashes($_POST['txtSex']);
          
    //Ki?m tra ng�?i d�ng �? nh?p li?u �?y �? ch�a
    if (!$username || !$password || !$email || !$fullname || !$birthday || !$sex)
    {
        echo "Vui l?ng nh?p �?y �? th�ng tin. <a href='javascript: history.go(-1)'>Tr? l?i</a>";
        exit;
    }
          
        // M? kh�a m?t kh?u
        $password = md5($password);
          
    //Ki?m tra t�n ��ng nh?p n�y �? c� ng�?i d�ng ch�a
    if (mysql_num_rows(mysql_query("SELECT username FROM member WHERE username='$username'")) > 0){
        echo "T�n ��ng nh?p n�y �? c� ng�?i d�ng. Vui l?ng ch?n t�n ��ng nh?p kh�c. <a href='javascript: history.go(-1)'>Tr? l?i</a>";
        exit;
    }
          
    //Ki?m tra email c� ��ng �?nh d?ng hay kh�ng
    if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email))
    {
        echo "Email n�y kh�ng h?p l?. Vui long nh?p email kh�c. <a href='javascript: history.go(-1)'>Tr? l?i</a>";
        exit;
    }
          
    //Ki?m tra email �? c� ng�?i d�ng ch�a
    if (mysql_num_rows(mysql_query("SELECT email FROM member WHERE email='$email'")) > 0)
    {
        echo "Email n�y �? c� ng�?i d�ng. Vui l?ng ch?n Email kh�c. <a href='javascript: history.go(-1)'>Tr? l?i</a>";
        exit;
    }
    //Ki?m tra d?ng nh?p v�o c?a ng�y sinh
    if (!ereg("^[0-9]+/[0-9]+/[0-9]{2,4}", $birthday))
    {
            echo "Ng�y th�ng n�m sinh kh�ng h?p l?. Vui long nh?p l?i. <a href='javascript: history.go(-1)'>Tr? l?i</a>";
            exit;
        }
          
    //L�u th�ng tin th�nh vi�n v�o b?ng
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
                          
    //Th�ng b�o qu� tr?nh l�u
    if ($addmember)
        echo "Qu� tr?nh ��ng k? th�nh c�ng. <a href='/'>V? trang ch?</a>";
    else
        echo "C� l?i x?y ra trong qu� tr?nh ��ng k?. <a href='dangky.php'>Th? l?i</a>";
?>