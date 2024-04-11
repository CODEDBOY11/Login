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


    //read from database
    $query = "select * from users where user_name = '$user_name' limit 1";
    $result = mysqli_query($con, $query);

    if($result)
    {

        if($result && mysqli_num_rows($result) > 0)
        {

            $user_data = mysqli_fetch_assoc($result);
            
            if($user_data['password'] === $password)
            {
                $_SESSION['user_id'] =  $user_data['user_id'];
                header("Location: index.php");
                die;
            }
        }
    }
    echo "wrong username or password";
    }else
    {

        echo "Please enter some valid information!";
    }

}
?>
<!Doctype html>
<html>
<head>
    <title>Login</title>
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
            margin: 20px;
            width: 300px;
            height: 350px;
            text-align: center;
            position: relative;
            left: 450px;
            background-color: black;
        }
        a{
            text-decoration: none;
        }
        input[type="text"]
        input[type="password"]
        input[type="submit"]{
            width: 90%;
            margin: 50px;
            padding:10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }
input[type="submit"]{
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
    margin-bottom: 20px;
    width: 50%;
    height: 35px;
}
input[type="submit"]:hover{
    background-color: #45a049;
    margin-bottom: 20px;
}
</style>
<h2>Login</h2>
<form action="login.php" method="post">
    <input style="margin-bottom: 50px; height:30px; width: 90%;" type="text" name="user_name" placeholder="Username"required><br><br>
    <input style="margin-bottom: 50px;  height:30px; width: 90%;" type="password" name="password" placeholder="Password"required><br><br>
    <input type="submit" value="Login"><br><br>
    or<br>
    <a style="margin-bottom: 50px; color: red" href="signup.php">Click to Signup</a>
</form>
</body>
</html>


