<?php
session_start();

include("classes/connect.php");
include("classes/login.class.php");
include("classes/post.class.php");

// return to the login page if not logged in
if (!isset($_SESSION['userid']) ||(trim ($_SESSION['userid']) == '')){
	header('location:login.php');
}

// even if not submit form, still read posts from database
$post = new Post();
$user = new User();
$id = $_SESSION['userid'];
$posts = $post->get_posts($id); // posts is an array that contains rows of post
$user_details = $user->get_user($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>socialBook - Responsive Social Media For Everyone</title>
<!-- ICONSCOUT CDN -->
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
<!-- STYLESHEET -->
<link rel="stylesheet" href="style.css">
<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
<Style>
  #therapist{
	width:100%;
	border-top: 1px solid rgba(58,58,58,0.03);
	border-bottom: 1px solid rgba(58,58,58,0.03);
	padding: 50px 0px;
	background-image: url("../images/bg.png");
	background-position: center;
	background-size: 1000px;
}
.therapist-heading{
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
}
.c-box-container{
	display: flex;
	justify-content: center;
	align-items: center;
	flex-wrap: wrap;
	margin:20px 0px;
}
.therapist-box {
	width:310px;
	height: 350px;
	background-color: #FFFFFF;
	border-radius: 10px;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	padding: 10px;
	margin: 20px;
	box-shadow: 5px 10px 30px rgba(0,0,0,0.08);
}
.therapist-box img{
	width:90px;
	height: 90px;
	border-radius: 50%;
	object-fit: cover;
}
.therapist-box strong{
	color:#1c3548;
	margin:0px;
	font-size: 1.1rem;
	font-weight: 600;
	margin-top:10px;
}
.star{
display: flex;
	margin: 10px 0px 10px 0px;
}
.star i{
	color:#ff9529;
}
.therapist-box p{
	color:#747474;
	font-size: 0.9rem;
	margin:0px;
	text-align: center;
	display: block;
	display: -webkit-box;
	max-width: 80%;
	-webkit-line-clamp:4;
	-webkit-box-orient:vertical;
	overflow: hidden;
	text-overflow: ellipsis;
}
.therapist-box a{
	width:190px;
	height: 44px;
	display: flex;
	justify-content: center;
	align-items: center;
	color:#FFFFFF;
	background-color: #1db096;
	border-radius: 20px;
	box-shadow: 4px 10px 30px rgba(24,139,119,0.2);
}
.therapist-box a{
	width:140px;
	margin-top: 20px;
	border-radius: 0px;
}
.therapist-box:hover{
	transform: translateY(-10px);
	box-shadow: 5px 10px 30px rgba(0,0,0,0.1);
    background-color: #23cdaf;
	transition: all ease 0.2s;
}
.container {
  width: 80%;
  margin: 0 auto;
}
</style>

</head>
<body>
<?php
    include('header.php');
    $profile_image = "";

    if(file_exists($user_details['profile_image']))
    {
        $image = $user_details['profile_image'];
    }
?>
<main>
<div class="middle">
    <h1> Don't worry! We're here for you! </h1>
</main>

  <!--therapist----------------------------------->
  <section id="therapist">
	<!--heading------->
	<div class="therapist-heading">

	</div>
	<!--therapist-box-container--------------->
	<div class="c-box-container">
	<!--box-1----->	
	<div class="therapist-box">
		<!--img-------->
		<img src="./images/therapist-1.jpeg"/>
		<!--stars/reviews---------->
		<div class="star">
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
		</div>
		<!--details/comment------>
		<p>Hi. My name is Lynda. I am a Person-Centred Counsellor (MNCS ProfAccred) providing one to one counselling sessions for adults, couples and children.  Counselling is not about me offering you advice or direction, but about me supporting you to find the solutions that fit you as an individual, helping you move forward with clarity and new insights towards a positive outcome.</p>
		<!--btn--------->
		<a href="#">Appointment</a>
	</div>
		<!--box-2----->	
	<div class="therapist-box">
		<!--img-------->
		<img src="./images/therapist-2.jpeg"/>
		<!--stars/reviews---------->
		<div class="star">
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="far fa-star"></i>
		</div>
		<!--details/comment------>
		<p>Do you feel depressed or anxious and don't know what to do to feel well again? Are you in a controlling relationship and don't know what to do next? Do you want to be you again, be a happy and respected person? I am a counsellor helping you to improve your mental health by finding new coping strategies. Together we will explore the underlying reasons of your emotional struggles.  </p>
		<!--btn--------->
		<a href="#">Appointment</a>
	</div>
		<!--box-3----->	
	<div class="therapist-box">
		<!--img-------->
		<img src="./images/therapist-3.jpeg"/>
		<!--stars/reviews---------->
		<div class="star">
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="far fa-star"></i>
		</div>
		<!--details/comment------>
		<p>I specialise in the Person-Centred Approach. There are no particular areas or problems in which I focus my work. I specialise in creating an environment which encourages and develops personal growth.
If you feel that you may benefit from counselling but are concerned about costs, please do not let this deter you.</p>
		<!--btn--------->
		<a href="#">Appointment</a>
	</div>
	</div>
	</section>

