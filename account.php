<?php
    include('db.php'); 
    
    if(isset($_POST["action"]))
    {
        $firstname= $_POST['firstname'];
        $lastname= $_POST['lastname'];
        $middleinitial= $_POST['middleinitial'];
        $email= $_POST['email'];
        $username= $_POST['username'];
        $password= $_POST['password'];
        $contact= $_POST['contact'];
        $address= $_POST['address'];
        $birthday= $_POST['birthday'];
        $gender= $_POST['gender'];
		$usertypename= $_POST['usertypename']; //USER TYPE foreign key USERTYPEID

        $stmt = $connection->prepare("INSERT INTO user (user_firstname, user_lastname, user_middleinitial, user_email, user_username, user_password,
        user_contactnumber, user_address, user_bday, user_gender) VALUES(?,?,?,?,?,?,?,?,?,?)");

        $stmt->execute([$firstname,$lastname,$middleinitial,$email,$username,$password,$contact,$address,
        $birthday,$gender]);

        $oneid = $connection->lastInsertId();
        $stmt = $connection->prepare("INSERT INTO usertype (user_ID,usertype_name) 
        VALUES(?,?)");
        $stmt->execute([$oneid,$usertypename]);
        echo 'Successfully Created!';
                                            
		
    }
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="mycss/design.css">
	<script src="./js/sidenav.js" type="text/javascript"></script>
	<script src="./js/acc.js" type="text/javascript"></script>
	<script src="./js/bootstrap.js" type="text/javascript"></script>
	<title>Sample Website (B.A.H.S)</title>
</head>
<body>
	<div id="body">
		<div id="topheader">
			<div id="health">
				<a href="index.php"><img src="./image/aglayan.png"></a>
				<a href="index.php"> <strong> HealthStation</strong></a>
			</div>
			<div class="navbar">
				<a class="home" href="index.php">Home</a>
				<a class="pr" href="record.php">Patient Record</a>

				<div id="form" class="dropdown">
					<button onclick="myFunction()" class="dropbtn">Forms &#9660</button>
					<div id="myDropdown" class="dropdown-content">
					  <a href="adult.php">Adult ITR</a>
					  <a href="child.php">Child ITR</a>
					  <a href="referral.php">Clinic Referral</a>
					  <a href="family.php">Family Planning</a>
					  <a href="prenatal.php">Prenatal Form</a>
					</div>
				</div>

				<div id="form" class="dropdown1">
					<button onclick="myFunction1()" class="dropbtn1">&#9776</button>
					<div id="myDropdown1" class="dropdown-content1">
    				  <a href="#home">Account</a>
      				  <a href="#about">About</a>
    				  <a href="#contact">Contact</a>
					  <a href="login.html">Logout &#9660</a>
  					</div>
				</div>
				<!--<a id="logout" href="login.html"> <img src="./image/logout.png"> </a>-->
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
		<div class="container table-responsive text-nowrap" style="overflow-x: auto;">
                <br>
                    <h2>Account List</h2>
                    <br>
					<hr>        
                    <table class="table table-hover">
                        <thead>
                            <tr>                            
                                <th class="col">ID</th>
                                <th class="col">Lastname</th>
                                <th class="col">Firstname</th>
                                <th class="col">MI</th>
                                <th class="col">Usertype</th>
								<th class="col">Email</th>
								<th class="col">Contact</th>
								<th class="col">Address</th>
								<th class="col">Birthday</th>
								<th class="col">Gender</th>

                            </tr>
                        </thead>
                            <tbody>
                                <?php
                                    //$output = array();
                                    $stmt = $connection->prepare("SELECT * FROM user INNER JOIN usertype ON user.user_ID=usertype.user_ID");
                                    $stmt->execute();
                                    $result = $stmt->fetchAll();

                                    foreach($result as $row)
                                    {
                                        echo "<tr>";
                                            echo "<td>";    echo $row["user_ID"];    echo "</td>";
											echo "<td>";    echo $row["user_lastname"];    echo "</td>";
                                            echo "<td>";    echo $row["user_firstname"];    echo "</td>";
                                            echo "<td>";    echo $row["user_middleinitial"];    echo "</td>";
											echo "<td>";    echo $row["usertype_name"];    echo "</td>";//INNER JOIN from USER to USERTYPE
                                            echo "<td>";    echo $row["user_email"];    echo "</td>"; 
											echo "<td>";    echo $row["user_contactnumber"];    echo "</td>";
											echo "<td>";    echo $row["user_address"];    echo "</td>";
											echo "<td>";    echo $row["user_bday"];    echo "</td>";
											echo "<td>";    echo $row["user_gender"];    echo "</td>";
                                        echo "</tr>";
                                    }


                                    //$result=mysqli_query($con, "SELECT itr.itr_ID, itr.itr_firstname, itr.itr_lastname, itr.itr_middleinitial, itr.itr_age, itr.itr_bday, itr.itr_gender, itr.itr_contactnumber, itr.itr_streetaddress, itr.itr_barangayaddress, itr.itr_municipalityaddress, itr.itr_medicalstatus, itr.itr_BHWassigned, itr.itr_philhealthnumber, itr.itr_philhealthstatus, itr.itr_philhealthmember, itr.itr_headoffamily, itr.itr_referralstatus, itr.itr_religion, itr.itr_ttstatus, itr.itr_datetime, child_itr.child_mothername, child_itr.child_fathername, child_itr.child_placedelivery	, child_itr.child_attendedby, child_itr.child_birthorder, child_itr.child_breastfed, child_itr.child_mixed, child_itr.child_dateofnbs, FROM itr INNER JOIN child_itr ON itr.itr_ID=child_itr.itr_IDfk");
                                    //$result=mysqli_query($con, "SELECT * FROM sample_one INNER JOIN sample_two ON sample_one.id=sample_two.one_idfk");
                                    //while($row=mysqli_fetch_array($result))
                                    //{
                                    //    echo "<tr>";
                                    //        echo "<td>";    echo $row["id"];    echo "</td>";
                                    //        echo "<td>";    echo $row["name"];    echo "</td>";
                                    //        echo "<td>";    echo $row["address"];    echo "</td>";
                                    //        echo "<td>";    echo $row["gender"];    echo "</td>";
                                    //        echo "<td>";    echo $row["skill_one"];    echo "</td>"; //INNER JOIN from ONE to TWO
                                    //    echo "</tr>";
                                    //}
                                ?>

                            </tbody>
                    </table>
					<div>
                		<button class="btn btn-primary font-bold mb-3" id="add_button" data-bs-toggle="modal" data-bs-target="#insertJobModal">Add Account</button>

       				 </div>
                </div>
        


		<div class="body">
                    <!-- Insert Modal -->
            <div class="modal fade" id="insertJobModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <form method="post" id="createForm" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Account</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
							<div class="row">
                            		<div class="form-group col-md-5">
                            		    <label for="title" class="form-label">Firstname:</label>
                            		    <input type="text" class="form-control" name="firstname" id="firstname" aria-describedby="emailHelp">
                            		</div>
									<div class="form-group col-md-5">
                            		    <label for="title" class="form-label">Lastname:</label>
                            		    <input type="text" class="form-control" name="lastname" id="lastname" aria-describedby="emailHelp">
                            		</div>
									<div class="form-group col-md-2">
                            		    <label for="title" class="form-label">MI:</label>
                            		    <input type="text" class="form-control" name="middleinitial" id="middleinitial" aria-describedby="emailHelp">
                            		</div>
							
                            		<div class="form-group col-md-6">
                            		    <label for="title" class="form-label">User Type:</label>
                            		    <input type="text" class="form-control" name="usertypename" id="usertypename" aria-describedby="emailHelp">
                            		</div>
									<div class="form-group col-md-6">
                            		    <label for="title" class="form-label">Email:</label>
                            		    <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                            		</div>
									<div class="form-group col-md-6">
                            		    <label for="title" class="form-label">Username:</label>
                            		    <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp">
                            		</div>
									<div class="form-group col-md-6">
                            		    <label for="title" class="form-label">Password:</label>
                            		    <input type="text" class="form-control" name="password" id="password" aria-describedby="emailHelp">
                            		</div>
									<div class="form-group col-md-3">
                            		    <label for="title" class="form-label">Contact #:</label>
                            		    <input type="text" class="form-control" name="contact" id="contact" aria-describedby="emailHelp">
                            		</div>
									<div class="form-group col-md-3">
                            		    <label for="title" class="form-label">Adress:</label>
                            		    <input type="text" class="form-control" name="address" id="address" aria-describedby="emailHelp">
                            		</div>
									<div class="form-group col-md-3">
                            		    <label for="title" class="form-label">Birthday:</label>
                            		    <input type="text" class="form-control" name="birthday" id="birthday" aria-describedby="emailHelp">
                            		</div>
									<div class="form-group col-md-3">
                            		    <label for="title" class="form-label">Gender:</label>
                            		    <input type="text" class="form-control" name="gender" id="gender" aria-describedby="emailHelp">
                            		</div>
									
							</div>
                        </div>
                        <div class="model-footer m-3">
                            <input type="hidden" name="job_id" id="job_id">
                            <input type="hidden" name="operation" id="operation">
                            <input type="submit" name="action" id="action" class="btn btn-primary" value="Create">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
    	</div>
			</main>
		</section>
	</div>


	
	<!--<script type="text/javascript">

            $(document).on('submit', '#createForm', function(event) {
                event.preventDefault();
                var firstname = $("#firstname").val();
                var lastname = $("#lastname").val();
                var middleinitial = $("#middleinitial").val();
                var usertype = $("#usertype").val();
                var email = $("#email").val();
				var username = $("#username").val();
				var password = $("#password").val();
				var contact = $("#contact").val();
				var address = $("#address").val();
				var birthday = $("#birthday").val();
				var gender = $("#gender").val();

                if(firstname != '' && lastname != '' && middleinitial != '' && usertype != '' && email != ''
				&& username != '' && password != '' && contact != '' && address != '' && birthday != '' && gender != '')
                {
 
                }
                else {
                    alert("Title, Company Name, Company Location, Salary and Job Types are Required!");
                }
            });

    </script> -->
</body>
</html>