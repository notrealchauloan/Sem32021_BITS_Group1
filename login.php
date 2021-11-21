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
 body{
     background-image: url("img/loginwall.jpg");
 }
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
<div class="container d-flex align-items-center justify-content-center" style="min-height:90vh;">
    <div class="card" style="background-color: skyblue;" >
        <div class="row d-flex align-items-center">
            <div class="col-lg-6">
                <h2 class="text-center" style="color:#fff;"> Welcome back to your Social Book </h2>
    
                <!-- <div class="card1 " >
                    <div class="row"> <img src="images/logo.png" class="logo" style="width: 50; "></div>
                </div> -->
            </div>
            <div class="col-lg-6" >
                <div class="card px-4"  >
                    <!-- <div class="row mb-4 px-3">
                        <h3 class="mb-0 mr-4 mt-2 text-center" >Sign in with</h3>
                        <div class="social media text-center mr-3 mt-2">
                            <div class="bi bi-facebook">
                            
                            <div class="fa fa-twitter">
                            
                            <div class="fa fa-google">
                        </div>
                    </div> -->
                    <br>
                    <h3 style="color: hsl(252, 92%, 67%); text-align:center;">Sign in with your SocialBook Account</h3>

                <form method="post">
                    
                    <div class="row form-group">
                        <label for="exampleInputEmail1" class="form-label mt-3">Email address</label>
                        <input value='<?php echo $email; ?>' name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                        <label for="exampleInputPassword1" class="form-label mt-3">Password</label>
                        <input name="password1" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                
                    <!-- <div class="row px-3 mb-4 mt-4">
                        <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> <label for="chk1" class="custom-control-label text-sm">Remember me</label> </div> <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                    </div> -->
                    <div class="row mb-3 px-3 mt-4"> <button type="submit" class="btn btn-lg" style="background-color:hsl(252, 92%, 67%); color:#fff;" >Login</button> </div>
                    <div class="row mb-4 px-3"> <small class="font-weight-bold">Don't have an account? <a style="color:hsl(252, 92%, 67%)">Register</a></small> </div>
                    
                </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
</body>
</html>