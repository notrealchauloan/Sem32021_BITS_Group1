<?php
session_start();
include("classes/connect.php");
include("classes/login.class.php");

// define variables and set to empty values
$email = "";
$password = "";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $login = new Login();
    $result = $login->evaluate($_POST);
    
    if($result != "")
    {
        echo "<div style='text-align:center;'>";
        echo "The following errors occured <br>";
        echo $result;
        echo "</div>";
    }
    else
    {
        header("Location: index.php");
        die;
    }
        $email = $_POST['email'];
        $password = $_POST['password'];
}
?>

<!-- Admin Login form -->
<!DOCTYPE html>
<html lang="en">
<style>

    .form{
        background-color: rgb(158, 32, 32);
            width: 400px;
            height: 400px;
            margin: 3em auto;
            border-radius: 1.5em;
            box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14)
    }
    .card1{
        position: relative;
        top: 250px;
        left: 135px;
        width: 340px;


    }
    .card{
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14)
    }
    .welcome{
        color: white;
        position: relative;
        top: 230px;
    }


</style>
<head>
	<meta charset="UTF-8">
	<title>User Login</title>
	<!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.1.3/dist/united/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div style="background-color: skyblue; height: 500px;"
  class="d-flex align-items-center justify-content-center"
  "
>
  <button type="button" class="btn btn-primary">Example button</button>
</div>
</body>
</html>