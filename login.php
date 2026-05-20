<?php
session_start();
$conn = mysqli_connect("localhost","root","","informatika");

$username = $_POST['username'];
$password = $_POST['password'];
$submit = $_POST['submit'];

if($submit){

    $sql = "SELECT * FROM user 
            WHERE Username='$username' 
            AND Password='$password'";

    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);

    if($row['Username'] != ""){

        $_SESSION['username'] = $row['Username'];
        $_SESSION['nama'] = $row['Nama'];
        $_SESSION['status'] = $row['Status'];

        if($row['Status']=="Administrator"){
            header("location:admin.php");
        }else{
            header("location:member.php");
        }

    }else{
        echo "<script>
                alert('Login Gagal');
                document.location='login.php';
              </script>";
    }
}
?>

<html>
<head>
    <title>Login Session</title>
</head>
<body>

<center>
<h2>LOGIN USER</h2>

<form method="post" action="">
<table>
<tr>
    <td>Username</td>
    <td><input type="text" name="username"></td>
</tr>

<tr>
    <td>Password</td>
    <td><input type="password" name="password"></td>
</tr>

<tr>
    <td></td>
    <td><input type="submit" name="submit" value="Login"></td>
</tr>
</table>
</form>
</center>

</body>
</html>