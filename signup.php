<?php
    include("classes/connect.php");
    include("classes/signup.class.php");

    // define variables and set to empty values
    $firstname = "";
    $lastname = "";
    $email = "";
    $password = "";
    $gender = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $signup = new Signup();
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
            $password = $_POST['password1'];
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

<body style="background-color:FloralWhite" >
	
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
                                    <input value='<?php echo $firstname; ?>' name="firstname" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter your first name">
                                </div>
                                <div class="col-6">
                                    <label for="lastname" class="form-label mt-4">Last name</label>
                                    <input value='<?php echo $lastname; ?>' name="lastname" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter your last name">
                                </div>
                                  
                                <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
                                <input value='<?php echo $email; ?>' name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
       
                                <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
                                <input name="password1" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">

                                <label for="exampleInputPassword2" class="form-label mt-4">Confirm Password</label>
                                <input name="password2" type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirm your Password">
                              
                                <label class="form-label mt-4"> Gender</label>
                            </div>
                            
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input name="gender" value="F" <?php echo $gender == 1? "checked" : ""; ?> type="radio" class="form-check-input" id="optionsRadios1">
                                    Female 
                                </label> <br>
  
                                <label class="form-check-label">
                                    <input name="gender" value="M" <?php echo $gender == 2? "checked" : ""; ?> type="radio" class="form-check-input" id="optionsRadios2">
                                    Male
                                </label> <br> 
     
                                <label class="form-check-label">
                                    <input name="gender" value="O" <?php echo $gender == 3? "checked" : ""; ?> type="radio" class="form-check-input" id="optionsRadios3">
                                    Other
                                </label>  <br>
                            </div>
                        
                <div class="col-lg-6" >
                    <div class="right text-center"  >
                        <h4 class="mb-0 mr-4 mt-2 text-center" >General Mental Health Questions</h4>
                        
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label mt-4">Have you had any problems with your work or daily life due to any emotional problems, such as feeling depressed, sad or anxious?  </label> 
                                <select class="form-select" id="exampleSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                  </select>
                                  <label for="exampleInputEmail1" class="form-label mt-4">How often has your mental health affected your relationships? </label> 
                                <select class="form-select" id="exampleSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                  </select>
                                  <label for="exampleInputEmail1" class="form-label mt-4">Overall how would you rate your mental health?</label> 
                                <select class="form-select" id="exampleSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                  </select>
                                  <label for="exampleInputEmail1" class="form-label mt-4">Would you be willing to have a friend with mental illness? </label> 
                                <select class="form-select" id="exampleSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                  </select>
                            </div>

                        <br>
                        <div class="row mb-3 px-3"> <button type="submit" class="btn btn-primary">Register</button> </div>
                               
                        <div class="row mb-4 px-3"> <small class="font-weight-bold">Already have an account? <a class="text-danger ">Sign In</a></small> </div>
                           
                    </div>
                    </div>     
                        
                </div>
</form>
                </div>
                
            </div>
            
        </div>
    </div>
