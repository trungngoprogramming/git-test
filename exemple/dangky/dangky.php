<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Trang ��ng l?</title>
    </head>
    <body>
        <h1>Trang ��ng k? th�nh vi�n</h1>
        <form action="xuly.php" method="POST">
            <table cellpadding="0" cellspacing="0" border="1">
                <tr>
                    <td>
                        T�n ��ng nh?p : 
                    </td>
                    <td>
                        <input type="text" name="txtUsername" size="50" />
                    </td>
                </tr>
                <tr>
                    <td>
                        M?t kh?u :
                    </td>
                    <td>
                        <input type="password" name="txtPassword" size="50" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Email :
                    </td>
                    <td>
                        <input type="text" name="txtEmail" size="50" />
                    </td>
                </tr>
                <tr>
                    <td>
                        H? v� t�n :
                    </td>
                    <td>
                        <input type="text" name="txtFullname" size="50" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Ng�y sinh :
                    </td>
                    <td>
                        <input type="text" name="txtBirthday" size="50" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Gi?i t�nh :
                    </td>
                    <td>
                        <select name="txtSex">
                            <option value=""></option>
                            <option value="Nam">Nam</option>
                            <option value="Nu">N?</option>
                        </select>
                    </td>
                </tr>
            </table>
            <input type="submit" value="��ng k?" />
            <input type="reset" value="Nh?p l?i" />
        </form>
    </body>
</html>