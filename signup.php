<?php
session_start();
include("connection.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {


    //save to database
    $user_id = random_num(20);
    $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";
    mysqli_query($con, $query);
    header("Location: login.php");
    die;
    }else
    {

        echo "Please enter some valid information!";
    }

}
?>
<!Doctype html>
<html>
<head>
    <title>Signup</title>
</head>
<body>
    <style>
        body{
            text-align: center;

        }
        form{
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px;
            text-align: center;
            position: relative;
            left: 450px;
        }
        input[type="text"]
        input[type="password"]
        input[type="submit"]{
            width: 90%;
            margin-bottom: 10px;
            padding:10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }
input[type="submit"]{
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
}
input[type="submit"]:hover{
    background-color: #45a049;
}
</style>
<h2>Signup</h2>
<form action="signup.php" method="post">
    <input type="text" name="user_name" placeholder="Username"required><br><br>
    <input type="password" name="password" placeholder="Password"required><br><br>
    <input type="submit" value="Signup"><br><br>
    <a href="login.php">Click to login</a>
</form>
</body>
</html>


