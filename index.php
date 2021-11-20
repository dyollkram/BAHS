<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="mycss/design.css">
	<script src="./js/sidenav.js" type="text/javascript"></script>
	<script src="./js/bootstrap.js" type="text/javascript"></script>
	<title>Sample Website (B.A.H.S)</title>
</head>
<body>
	<div id="body">
		<div id="topheader">
			<div id="health">
				<a href="#"><img src="./image/aglayan.png"></a>
				<a href="#"> <strong> HealthStation</strong></a>
			</div>
			<div class="navbar">
				<a class="home" href="#home">Home</a>
				<a class="pr" href="#">Patient Record</a>
				<div id="form" class="dropdown">
					<button onclick="myFunction()" class="dropbtn">Forms &#9660</button>
					<div id="myDropdown" class="dropdown-content">
					  <a href="#">Adult ITR</a>
					  <a href="#">Child ITR</a>
					  <a href="#">Clinic Referral</a>
					  <a href="#">Family Planning</a>
					  <a href="#">Prenatal Form</a>
					</div>
				</div>
				<a id="logout" href="login.html"> <img src="./image/logout.png"> </a>
			</div>

			<!--<header id="head">
				<nav>
					<a href="https://healthstation.ng/">Home</a>
					<a href="#">Patient Records</a>
					<a href="#">Contact</a>
					<a href="login.html"> <img src="./image/logout.png"> </a>

				</nav>
			</header> -->
		</div>
		<section id="left">
			<h1>Have a history <br>record?</h1>
			<div id="search1">
				<form id="searchbar">
					<input type="text" name="search" placeholder="Search Patient">
				</form>
				<div id="searchimg">
					<img src="./image/search1.png">
				</div>
			</div>
			<div id="patientrecord">
				<a href="#">Patient Record</a>
			</div>
			<div id="patientimg">
				<img src="./image/patient.png">
			</div>
		</section>
		<!-- <section id="right">
			<main id="main">
				<div id="mySidenav" class="sidenav">
					<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
					<a href="#">Adult ITR</a>
					<a href="#">Child ITR</a>
					<a href="#">Prenatal Form</a>
					<a href="#">Family Plannning Form</a>
					<a href="#">Clinic Referral Form</a>
				</div>

				<span id="sample" onclick="openNav()"> Select type of forms &#9776;</span>



				<h2>
					Select type of Forms
				</h2>
				<div id="forms" class="five">
					<div id="child">
						<a href="#">
							<button id="adultbutton" class="buttonfac b1"> Child ITR </button>
						</a> 						
					</div>
					<div id="adult" class="five">
						<a href="#">
							<button class="buttonfac b2"> Adult ITR </button>
						</a>					
					</div>
					<div id="prenat" class="five">
						<a href="#">
							<button class="buttonfac b3"> Prenatal Form </button>
						</a>					
					</div>
					<div id="family" class="five">
						<a href="#">
							<button class="buttonfac b4"> Family Plannning Form </button>
						</a>						
					</div>
					<div id="linic" class="five">
						<a href="#">
							<button class="buttonfac b5"> Clinic Referral Form </button>
						</a>
					</div> -->
				</div>
			</main>
		</section>
	</div>
</body>
</html>