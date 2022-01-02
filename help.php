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
	padding: 0px 0px;
	background-image: url("../images/bg.png");
	background-position: center;
	background-size: 1000px;
    background-color: Hazelnut;
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
	margin:10px 0px;
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
display: inline-block;
  padding: var(--btn-padding);
  font-weight: 500;
  border-radius: var(--border-radius);
  cursor: pointer;
  transition: all 300ms ease;
  font-size: 0.9rem;
}

.therapist-box:hover{
	transform: translateY(-10px);
	box-shadow: 5px 10px 30px rgba(0,0,0,0.1);
    background-color: #23cdaf;
	transition: all ease 0.2s;
}
.word {
  font-size: 20px;
  margin: 25px;
  width: 600px;
  height: 100px;
}
#heading,contact{
	display:flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	margin:70px 4px;
    background-color: yellow;
}
h3{
	font-size:4rem;
	margin:20px;
    text-align: center;
}
#heading img{
	max-width: 100%;
    height: auto;
}
#contact{
	display:flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	margin:40px 0px;
}
#contact h3{
	font-size:2.5rem;
	margin:20px;
}
.contact-input{
	width:400px;
	height:50px;
	background-color:#FFFFFF;
	display:flex;
	justify-content: center;
	border-radius: 50px;
	box-shadow: 2px 2px 30px rgba(0,0,0,0.15);
}
.contact-input input{
	width:100%;
	background-color: transparent;
	border:none;
	outline: none;
	text-align: center;
	color:#242425;
}
.contact-input a{
	width:200px;
	height:35px;
	background-color:#1db096;
	color:#FFFFFF;
	display: flex;
	font-size: 0.9rem;
	justify-content: center;
	align-items: center;
	margin: auto 10px;
	border-radius: 20px;
	font-weight: 500;
}
footer{
	display:flex;
	justify-content: space-around;
	border-top: 1px solid rgba(232,232,232,0.5);
	background-color:#FFFFFF;
}
footer p{
	margin:15px 0px;
	color:#5f5f5f;
	font-size: 0.9rem;
}

</style>

</head>
<body background="./images/welcome.png">
<?php
    include('header.php');
    $profile_image = "";

    if(file_exists($user_details['profile_image']))
    {
        $image = $user_details['profile_image'];
    }
?>
<!--heading------------------------->
<section id="heading">
	<!--img-------->
	<img src="https://images.unsplash.com/photo-1620389701363-b1d7a601e0c9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"/>
</section>
  <!--heading---------------->
	<h3>Professional, licensed, and vetted therapists who you can trust</h3>

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
		<a href="booking.php">
        <button type="button" style="float: right; font-weight:bold" class="btn btn-primary">Book an Appointment</button>
        </a>
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
			<i class="fas fa-star"></i>
		</div>
		<!--details/comment------>
		<p>Do you feel depressed or anxious and don't know what to do to feel well again? Are you in a controlling relationship and don't know what to do next? Do you want to be you again, be a happy and respected person? I am a counsellor helping you to improve your mental health by finding new coping strategies. Together we will explore the underlying reasons of your emotional struggles.  </p>
		<!--btn--------->
		<a href="booking.php">
        <button type="button" style="float: right; font-weight:bold" class="btn btn-primary">Book an Appointment</button>
        </a>
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
			<i class="far fa-star"></i>
			<i class="far fa-star"></i>
		</div>
		<!--details/comment------>
		<p>I specialise in the Person-Centred Approach. There are no particular areas or problems in which I focus my work. I specialise in creating an environment which encourages and develops personal growth.
If you feel that you may benefit from counselling but are concerned about costs, please do not let this deter you.</p>
		<!--btn--------->
		<a href="booking.php">
        <button type="button" style="float: right; font-weight:bold" class="btn btn-primary">Book an Appointment</button>
        </a>
	</div>
    <!--box-4----->	
	<div class="therapist-box">
		<!--img-------->
		<img src="./images/therapist-8.jpeg"/>
		<!--stars/reviews---------->
		<div class="star">
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="far fa-star"></i>
		</div>
		<!--details/comment------>
		<p>We all struggle to make sense of experiences at times, for example, when our life is in transition as we are leaving home or taking on new caring responsibilities. As a counsellor I can offer the opportunity to talk in confidence. I have worked in mental health for over 20 years and have trained as a social worker as well as a counsellor.   </p>
		<!--btn--------->
		<a href="booking.php">
        <button type="button" style="float: right; font-weight:bold" class="btn btn-primary">Book an Appointment</button>
        </a>
	</div>
		<!--box-5----->	
	<div class="therapist-box">
		<!--img-------->
		<img src="./images/therapist-6.jpeg"/>
		<!--stars/reviews---------->
		<div class="star">
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="far fa-star"></i>
			<i class="far fa-star"></i>
		</div>
		<!--details/comment------>
		<p>I am an Integrative counsellor, using a range of approaches to help you individually. I have training in gestalt and psychodynamic counselling, with both individuals and groups. Your view of the world is important in its impact on how you cope in life. I see counselling as a partnership. I am a qualified Equine Facilitated Psychotherapist..</p>
		<!--btn--------->
		<a href="booking.php">
        <button type="button" style="float: right; font-weight:bold" class="btn btn-primary">Book an Appointment</button>
        </a>
	</div>
    <!--box-6----->	
	<div class="therapist-box">
		<!--img-------->
		<img src="./images/therapist-4.jpeg"/>
		<!--stars/reviews---------->
		<div class="star">
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="far fa-star"></i>
		</div>
		<!--details/comment------>
		<p>I have experience working with young people both in an educational setting and as a Counsellor. I specifically have knowledge and experience of working with young people who have additional learning needs, such as Autism and ADHD. Areas of counselling I deal with include (but are not limited to); Anxiety, Stress, Exam stress, Depression, Trauma, etc...</p>
		<!--btn--------->
		<a href="booking.php">
        <button type="button" style="float: right; font-weight:bold" class="btn btn-primary">Book an Appointment</button>
        </a>
	</div>
    <!--box-7----->	
	<div class="therapist-box">
		<!--img-------->
		<img src="./images/therapist-7.jpeg"/>
		<!--stars/reviews---------->
		<div class="star">
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="far fa-star"></i>
			<i class="far fa-star"></i>
			<i class="far fa-star"></i>
		</div>
		<!--details/comment------>
		<p>Hi, my name is Emma and I am a qualified Person-centred counsellor (MBACP). Being Person-centred means that the sessions I offer are client-led, valuing the unique experience of each individual. We can all face times in our lives where we feel like we need extra support or just a listening ear.</p>
		<!--btn--------->
		<a href="booking.php">
        <button type="button" style="float: right; font-weight:bold" class="btn btn-primary">Book an Appointment</button>
        </a>
	</div>
    <!--box-8----->	
	<div class="therapist-box">
		<!--img-------->
		<img src="./images/therapist-5.jpeg"/>
		<!--stars/reviews---------->
		<div class="star">
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="far fa-star"></i>
			<i class="far fa-star"></i>
		</div>
		<!--details/comment------>
		<p>If you feel like you need someone to talk to or a safe space to explore your thoughts and feelings without being judged then please get in heading with me and we can arrange a session to begin your therapeutic journey.</p>
		<!--btn--------->
		<a href="booking.php"> 
        <button type="button" style="float: right; font-weight:bold" class="btn btn-primary">Book an Appointment</button>
        </a>
	</div>
	</div>
	</section>
</br>
<!--contact------------------------->
<section id="contact">
	<!--heading---------------->
	<h3>Stay Connected</h3>
	<!--input----------------->
	<div class="contact-input">
		<input type="email" placeholder="Example@gmail.com"/>
        <a href="booking.php">
        <button type="button" style="float: right; font-weight:bold" class="btn btn-primary">Continue</button>
        </a>
	</div>
	</section>
	<!--footer--------->
	<footer>
	<p>Going To Internet, Ltd Consumer Website</p>
	<p>Copyright 2020 - GoingToInternet</p>
	</footer>


