<?php
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);


?>
<!Doctype html>
<html>
    <head>
<title>my website</title>
    </head>
    <body>
<h1>This is the first page</h1>
<a href="logout.php">Logout</a>


<br>
Hello <?php echo $user_data['user_name']; ?>
</body>
</html>
