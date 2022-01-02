<!DOCTYPE html>
<html>
  <head>
    <title>BOOKING RESERVATION PAGE</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>
<style>
    .section {
	position: relative;
	height: 100vh;
}

.section .section-center {
	position: absolute;
	top: 50%;
	left: 0;
	right: 0;
	-webkit-transform: translateY(-50%);
	transform: translateY(-50%);
}

#booking {
	font-family: 'Montserrat', sans-serif;
	background-image: url('https://images.unsplash.com/photo-1499810631641-541e76d678a2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80');
	background-size: cover;
	background-position: center;
}

#booking::before {
	content: '';
	position: absolute;
	left: 0;
	right: 0;
	bottom: 0;
	top: 0;
	background: rgba(47, 103, 177, 0.6);
}

.booking-form {
	background-color: #fff;
	padding: 50px 20px;
	-webkit-box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
	box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
	border-radius: 4px;
}

.booking-form .form-group {
	position: relative;
	margin-bottom: 30px;
}

.booking-form .form-control {
	background-color: #ebecee;
	border-radius: 4px;
	border: none;
	height: 40px;
	-webkit-box-shadow: none;
	box-shadow: none;
	color: #3e485c;
	font-size: 14px;
}

.booking-form .form-control::-webkit-input-placeholder {
	color: rgba(62, 72, 92, 0.3);
}

.booking-form .form-control:-ms-input-placeholder {
	color: rgba(62, 72, 92, 0.3);
}

.booking-form .form-control::placeholder {
	color: rgba(62, 72, 92, 0.3);
}

.booking-form input[type="date"].form-control:invalid {
	color: rgba(62, 72, 92, 0.3);
}

.booking-form select.form-control {
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
}

.booking-form select.form-control+.select-arrow {
	position: absolute;
	right: 0px;
	bottom: 4px;
	width: 32px;
	line-height: 32px;
	height: 32px;
	text-align: center;
	pointer-events: none;
	color: rgba(62, 72, 92, 0.3);
	font-size: 14px;
}

.booking-form select.form-control+.select-arrow:after {
	content: '\279C';
	display: block;
	-webkit-transform: rotate(90deg);
	transform: rotate(90deg);
}

.booking-form .form-label {
	display: inline-block;
	color: #3e485c;
	font-weight: 700;
	margin-bottom: 6px;
	margin-left: 7px;
}

.booking-form .submit-btn {
	display: inline-block;
	color: #fff;
	background-color: #1e62d8;
	font-weight: 700;
	padding: 14px 30px;
	border-radius: 4px;
	border: none;
	-webkit-transition: 0.2s all;
	transition: 0.2s all;
}

.booking-form .submit-btn:hover,
.booking-form .submit-btn:focus {
	opacity: 0.9;
}

.booking-cta {
	margin-top: 80px;
	margin-bottom: 30px;
}

.booking-cta h1 {
	font-size: 52px;
	text-transform: uppercase;
	color: #fff;
	font-weight: 700;
}

.booking-cta p {
	font-size: 16px;
	color: rgba(255, 255, 255, 0.8);
}

</style>
    <?php
    // (A) PROCESS RESERVATION
    if (isset($_POST["date"])) {
      require "reserve.php";
      if ($_RSV->save(
        $_POST["date"], $_POST["slot"], $_POST["name"],
        $_POST["email"], $_POST["tel"], $_POST["notes"])) {
        echo "<div class='ok'>Reservation saved.</div>";
      } else { echo "<div class='err'>".$_RSV->error."</div>"; }
    }
    ?>

    <!-- (B) RESERVATION FORM -->
    <div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-push-5">
						<div class="booking-cta">
							<h1>Make your reservation</h1>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi facere, soluta magnam consectetur molestias itaque
								ad sint fugit architecto incidunt iste culpa perspiciatis possimus voluptates aliquid consequuntur cumque quasi.
								Perspiciatis.
							</p>
						</div>
					</div>
					<div class="col-md-4 col-md-pull-7">
						<div class="booking-form">
                            <form id="resForm" method="post" target="_self">
                                <div class="form-group">
									<span for="res_email" class="form-label">Email</span>
									<input class="form-control" type="text" placeholder="Enter your email account" required name="email"/>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<span for="res_name" class="form-label"> First Name</span>
											<input class="form-control" type="text" required name="name"/>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<span for="res_te" class="form-label">Phone Number</span>
											<input class="form-control" type="text" required name="tel"/>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
                                        <?php $mindate = date("Y-m-d"); ?>
											<span class="form-label">Reservation Date</span>
                                                <input class="form-control" type="date" required id="res_date" name="date"
                                                         min="<?=$mindate?>">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Reservation Slot</span>
											<select class="form-control" name="slot">
												<option value="AM"> AM</option>
												<option value="PM"> PM</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
								</div>
                                    <span for="res_notes" class="form-label">Message</span>
									<input class="form-control" type="text" placeholder="Tell us your story" name="notes"/>
                                    <br>
								<div class="form-btn">
									<button type="submit" class="submit-btn">Submit</button>
								</div>
							</form>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
  </body>
</html>
