<?php
	// start session
	session_start();

	// redirect to homepage if logged in (if user has already logged in and enter the login page)
	if(isset($_SESSION['userid'])){
		header('location:index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP Login using OOP Approach</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.1.3/dist/united/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="userstylesheet.css">

</head>
<body background="./images/welcome.png">
<div class="container d-flex align-items-center justify-content-center" style="min-height:90vh;">
        <div class="row d-flex align-items-center p-3">
            <div class="col-lg-6">
                <h1 class="text-center" style="color: black; font-size:80px"> Welcome back </h1>
				<h1 class="text-center" style="color: black; font-size:45px"> to your Social Book </h1>
				
				</div>
            <div class="col-lg-6" >
                <div class="card px-4"  >
				<br>
                    <h3 style="color: tomato; text-align:center;">Sign in with </h3>
					<div class="social media text-center mr-3">
                                <div class="bi bi-facebook">
                                
                                <div class="fa fa-twitter">
                             
                                <div class="fa fa-google">
                                </div>
                        </div>
					<br> <br> 
						<h7 style="color: tomato;">OR</h7>
		        	<form method="POST" action="login_validation.php">
		            	<fieldset>
						<div class="row form-group">
							<label class="form-label mt-3">Email address</label>
							<input name="username" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" required>

							<label class="form-label mt-3">Password</label>
							<input name="password" type="password" class="form-control" placeholder="Password" required>
							
						</div>
						<div class="row mb-3 mt-4 px-3">
							<button type="submit" name="login" class="btn btn-lg btn-danger btn-block"><span class="glyphicon glyphicon-log-in"></span> Login</button>		            	
						</div>
						<div class="row mb-4 px-3 text-center"> <small class="font-weight-bold">Don't have an account? <a class="text-decoration-none" href="signup.php">Register Now!</a></small> </div>
						</fieldset>
		        	</form>
		    	
		    </div>
		    <?php
				// if there is a message set
		    	if(isset($_SESSION['message'])){
		    		?>
		    			<div class="alert alert-info text-center">
					        <?php echo $_SESSION['message']; ?>
					    </div>
		    		<?php
		    		unset($_SESSION['message']);
		    	}
		    ?>
		</div>
	</div>
</div>
</body>
</html>