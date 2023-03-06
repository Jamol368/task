<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['uname'];
    $password = $_POST['psw'];
    $con = new \mysqli('db', 'root_user', 'root', 'task');
    $sql= "SELECT * FROM users WHERE login = '$username' AND password = '".md5($password)."' ";
    $result = mysqli_query($con,$sql);
    $check = mysqli_fetch_array($result);
    if(isset($check)){
        header("Location: http://localhost:8000/index.html");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <form action="" method="post">
            <div class="imgcontainer">
                <h2>Login page</h2>
            </div>

            <div class="container">
                <div class="form-group">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" class="form-control" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="form-control">Login</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
