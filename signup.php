<?php
    session_start();
    include("classes/connect.php");
    include("classes/signup.class.php");

    // define variables and set to empty values
    $firstname = $lastname = $email =  $password = $password_confirm = $gender = $sel1 = $sel2 = $sel3 = $sel4 = "";

    // If the registration form is submitted,
    //   create a class and store the result of its function in $result 
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // create signup class
        $signup = new Signup(); 

        // Call function evaluate with data $_POST
        $result = $signup->evaluate($_POST); 
        
        if($result != "")
        {
            echo "<div style='text-align:center;'>";
            echo "The following errors occured <br>";
            echo $result;
            echo "</div>";
            }
            else
            {
                header("Location: login.php");
                die;
            }
        
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $sel1 = $_POST['sel1'];
            $sel2 = $_POST['sel2'];
            $sel3 = $_POST['sel3'];
            $sel4 = $_POST['sel4'];
    }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create An Account</title>
	<!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.1.3/dist/united/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="userstylesheet.css">
</head>

<body background="./images/welcome.png">
	
	<div class="container px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
        <div class="card card0 border-0" style="background-color: hsl(252, 100%, 90%)" >
            <div class="row d-flex"  >
                <div class="col-lg-6"  >
                    
                    <div class="card2 card border-0 px-4 py-5"  >
                        <div class="row mb-4 px-3">
                            <h1 class="mb-0 mr-4 mt-2 text-center" >Create an account</h6>
                     
                        <form method="post" action="signup.php">
                           
                              <div class="row form-group">
                                  
                                <div class="col-6">
                                    <label for="firstname" class="form-label mt-4">First name</label>
                                    <input value='<?php echo $firstname; ?>' name="firstname" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter your first name" required>
                                </div>
                                <div class="col-6">
                                    <label for="lastname" class="form-label mt-4">Last name</label>
                                    <input value='<?php echo $lastname; ?>' name="lastname" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter your last name" required>
                                </div>
                                  
                                <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
                                <input value='<?php echo $email; ?>' name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
       
                                <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>

                                <label for="exampleInputPassword2" class="form-label mt-4">Confirm Password</label>
                                <input name="password_confirm" type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirm your Password" required>
                              
                                <label class="form-label mt-4"> Gender</label>
                            </div>
                            
                            <div class="form-check required">
                                <label class="form-check-label">
                                    <input name="gender" value="F" <?php echo $gender == 1? "checked" : ""; ?> type="radio" class="form-check-input" id="optionsRadios1">
                                    Female 
                                </label> <br>
  
                                <label class="form-check-label">
                                    <input name="gender" value="M" <?php echo $gender == 2? "checked" : ""; ?> type="radio" class="form-check-input" id="optionsRadios2">
                                    Male
                                </label> <br> 
     
                                <label class="form-check-label">
                                    <input name="gender" value="O" <?php echo $gender == 3? "checked" : ""; ?> type="radio" class="form-check-input" id="optionsRadios3" checked>
                                    Other
                                </label>  <br>
                            </div>
                        
                <div class="col-lg-6" >
                    <div class="right "  >
                        <h4 class="mb-0 mr-4 mt-2 text-center" >General Mental Health Questions</h4>
                        
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label mt-4">How often have you been bothered by feeling down, depressed or hopeless?</label> 
                                <select name="sel1" class="form-select" id="exampleSelect1">
                                    <option value="0">Not at all</option>
                                    <option value="1">Several days</option>
                                    <option value="2">More than half the days</option>
                                    <option value="3">Nearly every day</option>
                                  </select>
                                  <label for="exampleInputEmail1" class="form-label mt-4">How often have you had little interest or pleasure in doing things </label> 
                                <select name="sel2" class="form-select" id="exampleSelect1">
                                    <option value="0">Not at all</option>
                                    <option value="1">Several days</option>
                                    <option value="2">More than half the days</option>
                                    <option value="3">Nearly every day</option>
                                  </select>
                                  <label for="exampleInputEmail1" class="form-label mt-4">How often have you had trouble concentrating on things? </label>
                                <select name="sel3" class="form-select" id="exampleSelect1">
                                    <option value="0">Not at all</option>
                                    <option value="1">Several days</option>
                                    <option value="2">More than half the days</option>
                                    <option value="3">Nearly every day</option>
                                </select>

                                <label for="exampleInputEmail1" class="form-label mt-4">How often do you feel tired or having little energy? </label>
                                <select name="sel4" class="form-select" id="exampleSelect1">
                                    <option value="0">Not at all</option>
                                    <option value="1">Several days</option>
                                    <option value="2">More than half the days</option>
                                    <option value="3">Nearly every day</option>
                                </select>
                            </div>

                        <br>
                        <div class="row mb-3 px-3"> <button type="submit" class="btn btn-primary">Register</button> </div>
                               
                        <div class="row mb-4 px-3 text-center"> <small class="font-weight-bold">Already have an account? <a href="login.php" class="text-danger text-decoration-none">Sign In</a></small> </div>
                           
                    </div>
                    </div>     
                        
                </div>
                </form>
                </div>
                
            </div>
            
        </div>
    </div>
