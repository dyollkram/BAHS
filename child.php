<?php
    include('db.php'); 
    
    if(isset($_POST["insert"]))
    {
        $lastname= $_POST['lastname'];
        $firstname= $_POST['firstname'];
        $middleinitial= $_POST['middleinitial'];
        $age= $_POST['age'];
        $birthday= $_POST['birthday'];
        $gender= $_POST['gender'];
        $contact= $_POST['contact'];
        $streetaddress= $_POST['streetaddress'];
        $barangayaddress= $_POST['barangayaddress'];
        $municipalityaddress= $_POST['municipalityaddress'];
        $medicalstatus= $_POST['medicalstatus'];
        $bhwassigned= $_POST['bhwassigned'];
        $philhealthnumber= $_POST['philhealthnumber'];
        $philhealthstatus= $_POST['philhealthstatus'];
        $philhealthmember= $_POST['philhealthmember'];
        $headoffamily= $_POST['headoffamily'];
        $referralstatus= $_POST['referralstatus'];
        $religion= $_POST['religion'];
        $ttstatus= $_POST['ttstatus']; //CHILD ITR JOIN THE TABLE INSERT
        //$itrfk = 
        $mothername= $_POST['mothername'];
        $fathername= $_POST['fathername'];
        $placeofdelivery= $_POST['placeofdelivery'];
        $attendedby= $_POST['attendedby'];
        $birthorder= $_POST['birthorder'];
        $breastfed= $_POST['breastfed'];
        $mixedstatus= $_POST['mixedstatus'];
        $dateofnbs= $_POST['dateofnbs'];

        $stmt = $connection->prepare("INSERT INTO itr (itr_lastname, itr_firstname, itr_middleinitial, itr_age, itr_bday, itr_gender,
        itr_contactnumber, itr_streetadress, itr_barangayadress, itr_municipalityadress, itr_medicalstatus,
        itr_BHWassigned, itr_philhealthnumber, itr_philhealthstatus, itr_philhealthmember, itr_headoffamily,
        itr_referralstatus, itr_religion, itr_ttstatus) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $stmt->execute([$lastname,$firstname,$middleinitial,$age,$birthday,$gender,$contact,$streetaddress,
        $barangayaddress,$municipalityaddress,$medicalstatus,$bhwassigned,$philhealthnumber,$philhealthstatus,
        $philhealthmember,$headoffamily,$referralstatus,$religion,$ttstatus]);

        $oneID = $connection->lastInsertId();
        $stmt = $connection->prepare("INSERT INTO child_itr (itr_ID,child_mothername,child_fathername,child_placedelivery,child_attendedby,child_birthorder,child_breastfed,child_mixed,child_dateofnbs) 
        VALUES(?,?,?,?,?,?,?,?,?)");
        $stmt->execute([$oneID,$mothername,$fathername,$placeofdelivery,$attendedby,$birthorder,$breastfed,$mixedstatus,$dateofnbs]);
        echo 'Your form was successfully submitted!';
//
           
           
          // $sql = "INSERT INTO itr (itr_lastname, itr_firstname, itr_middleinitial, itr_age, itr_bday, itr_gender,
          //                      itr_contactnumber, itr_streetaddress, itr_barangayaddress, itr_municipalityaddress, itr_medicalstatus,
         //                       itr_BHWassigned, itr_philhealthnumber, itr_philhealthstatus, itr_philhealthmember, itr_headoffamily,
         //                       itr_referralstatus, itr_religion, itr_ttstatus) 
         //   VALUES('$lastname','$firstname','$middleinitial','$age','$birthday','$gender','$contact','$streetaddress',
         //           '$barangayaddress','$municipalityaddress','$medicalstatus','$bhwassigned','$philhealthnumber','$philhealthstatus',
         //           '$philhealthmember','$headoffamily','$referralstatus','$religion','$ttstatus')";
         //   
         //       $query= mysqli_query($con, $sql) or die (mysqli_error($con));
                //$lastID = "SELECT LAST_INSERTED_ID()";

        //        if($query === TRUE)
        //        {
        //            $sql2 = "INSERT INTO child_itr (itr_IDfk,child_mothername,child_fathername,child_placedelivery,child_attendedby,child_birthorder,child_breastfed,child_mixed,child_dateofnbs) 
        //            VALUES ('mysql_insert_id()','$mothername','$fathername','$placeofdelivery','$attendedby','$birthorder','$breastfed','$mixedstatus','$dateofnbs')";
       //             $query2= mysqli_query($con, $sql2) or die (mysqli_error($con));
       //             if($query2 === TRUE)
       //             echo 'Your form was successfully submitted!';
       //         }
       //         else
       //         {
       //             echo 'There was an error in submitting your form';
       //         }

                                                
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
    				  <a href="account.php">Account</a>
      				  <a href="#about">About</a>
    				  <a href="#contact">Contact</a>
					  <a href="login.html">Logout &#9660</a>
  					</div>
				</div>
			</div>
            <div class="body">
                <div class="container">
                
                <h2>Child ITR form</h2>
                    <form action="" name="childform" method="POST">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <!--<label for="lname">Lastname:</label>-->
                                <input type="text" class="form-control" id="Lastname" placeholder="Lastname" name="lastname">
                        </div>
                        <div class="form-group col-md-3">
                            <!--<label for="fname">Firstname:</label>-->
                                <input type="text" class="form-control" id="Firstname" placeholder="Firstname" name="firstname">
                        </div>
                        <div class="form-group col-md-1">
                            <!--<label for="mi">MI:</label>-->
                                <input type="text" class="form-control" id="MiddleInitial" placeholder="MI" name="middleinitial">
                        </div>
                        <div class="form-group col-md-1">
                            <!--<label for="age">Age:</label>-->
                                <input type="text" class="form-control" id="Age" placeholder="Age" name="age">
                        </div>
                        <div class="form-group col-md-2">
                            <!--<label for="bday">Birthday:</label>-->
                                <input type="text" class="form-control" id="Birthday" placeholder="Birthday Y-M-D" name="birthday">
                        </div>
                        <div class="form-group col-md-2">
                            <!--<label for="gender">Gender:</label>-->
                                <input type="text" class="form-control" id="Gender" placeholder="Gender" name="gender">
                        </div>
                        <div class="form-group-group col-md-3">
                            <!--<label for="street">StreetAddress:</label>-->
                                <input type="text" class="form-control" id="StreetAddress" placeholder="StreetAddress" name="streetaddress">
                        </div>
                        <div class="form-group-group col-md-3">
                            <!--<label for="barangay">Barangay Address:</label>-->
                                <input type="text" class="form-control" id="BarangayAddress" placeholder="Barangay Address" name="barangayaddress">
                        </div>
                        <div class="form-group-group col-md-3">
                            <!--<label for="municipality">Municipality Address:</label>-->
                                <input type="text" class="form-control" id="MunicipalityAddress" placeholder="Municipality Address" name="municipalityaddress">
                        </div>
                        <div class="form-group-group col-md-3">
                            <!--<label for="contact">Contact:</label>-->
                                <input type="text" class="form-control" id="Contact" placeholder="Contact" name="contact">
                        </div>
                        <div class="form-group-group col-md-6">
                            <!--<label for="father">Fathername:</label>-->
                                <input type="text" class="form-control" id="Fathername" placeholder="Father's name" name="fathername">
                        </div>
                        <div class="form-group-group col-md-3">
                            <!--<label for="bhw">BHW Assigned:</label>-->
                                <input type="text" class="form-control" id="BHWassigned" placeholder="BHW Assigned" name="bhwassigned">
                        </div>
                        <div class="form-group-group col-md-3">
                            <!--<label for="medical">Medical Status:</label>-->
                                <input type="text" class="form-control" id="Medicalstatus" placeholder="Medical Status" name="medicalstatus">
                        </div>
                        <div class="form-group-group col-md-6">
                            <!--<label for="mother">Mothername:</label>-->
                                <input type="text" class="form-control" id="Mothername" placeholder="Mother's name" name="mothername"> <!-- ADULT ITR JOIN -->
                        </div>
                        <div class="form-group-group col-md-2">
                            <!--<label for="philhealthnum">Philhealth #:</label>-->
                                <input type="text" class="form-control" id="Philhealthnumber" placeholder="Philhealth #" name="philhealthnumber">
                        </div>
                        <div class="form-group-group col-md-2">
                            <!--<label for="philhealthstat">Philhealth Status:</label>-->
                                <input type="text" class="form-control" id="Philhealthstatus" placeholder="Philhealth Status" name="philhealthstatus">
                        </div>
                        <div class="form-group-group col-md-2">
                            <!--<label for="philhealthmem">Philhealth Member:</label>-->
                                <input type="text" class="form-control" id="Philhealthmember" placeholder="Philhealth Member" name="philhealthmember">
                        </div>
                        <div class="form-group-group col-md-5">
                            <!--<label for="head">Head of Family:</label>-->
                                <input type="text" class="form-control" id="HeadofFamily" placeholder="Head of Family" name="headoffamily">
                        </div>
                        <div class="form-group-group col-md-2">
                            <!--<label for="referral">Referral Status:</label>-->
                                <input type="text" class="form-control" id="Referralstatus" placeholder="Referral Status" name="referralstatus">
                        </div>
                        <div class="form-group-group col-md-2">
                            <!--<label for="religion">Religion:</label>-->
                                <input type="text" class="form-control" id="Religion" placeholder="Religion" name="religion">
                        </div>
                        <div class="form-group-group col-md-3">
                           <!-- <label for="ttstatus">T.T Status:</label>-->
                                <input type="text" class="form-control" id="T.TStatus" placeholder="T.T Status" name="ttstatus">
                        </div>
                        <div class="form-group-group col-md-2">
                            <!--<label for="pod">Place of Delivery:</label>-->
                                <input type="text" class="form-control" id="PlaceofDelivery" placeholder="Place of Delivery" name="placeofdelivery">
                        </div>
                        <div class="form-group-group col-md-2">
                            <!--<label for="attended">Attended by:</label>-->
                                <input type="text" class="form-control" id="Attendedby:" placeholder="Attended by who?" name="attendedby">
                        </div>
                        <div class="form-group-group col-md-2">
                            <!--<label for="bo">Birth Order:</label>-->
                                <input type="text" class="form-control" id="BirthOrder" placeholder="Birth Order Y-M-D" name="birthorder">
                        </div>
                        <div class="form-group-group col-md-2">
                            <!--<label for="breastfed">Breastfed:</label>-->
                                <input type="text" class="form-control" id="Breastfed" placeholder="Breastfed" name="breastfed">
                        </div>
                        <div class="form-group-group col-md-2">
                            <!--<label for="mixed">Mixed Status:</label>-->
                                <input type="text" class="form-control" id="MixedStatus" placeholder="Mixed Status" name="mixedstatus">
                        </div>
                        <div class="form-group-group col-md-2">
                            <!--<label for="datenbs">Date of NBS:</label>-->
                                <input type="text" class="form-control" id="DateofNBS" placeholder="Date of NBS Y-M-D" name="dateofnbs">
                        </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="remember"> Remember me</label>
                            </div>
                    </div>
                        <button type="submit" name="insert" class="btn btn-default insert">Insert</button> |
                        <button type="submit" name="update" class="btn btn-default update">Update</button> |
                        <button type="submit" name="delete" class="btn btn-default delete">Delete</button>
                    </form>
                    
                </div>
                
                <div class="container table-responsive text-nowrap" style="overflow-x: auto;">
                <br>
                    <h2>Patient Record</h2>
                    <br>
                    <h3>Child ITR</h3>           
                    <table class="table table-hover">
                        <thead>
                            <tr>                            
                                <th class="col">ID</th>
                                <th class="col">Lastname</th>
                                <th class="col">Firstname</th>
                                <th class="col">MiddileInitial</th>
                                <th class="col">Age</th>
                                <th class="col">Birthday</th>
                                <th class="col">Gender</th>
                                <th class="col">Contact</th>
                                <th class="col">StreetAddress</th>
                                <th class="col">BarangayAddress</th>
                                <th class="col">MunicipalityAddress</th>
                                <th class="col">MedicalStatus</th>
                                <th class="col">BHW Assigned</th>
                                <th class="col">Philhealth #</th>
                                <th class="col">Philhealth Status</th>
                                <th class="col">Philhealth Member</th>
                                <th class="col">Head of Family</th>
                                <th class="col">Referral Status</th>
                                <th class="col">Religion</th>
                                <th class="col">T.T Status</th>
                                <th class="col">Mothername</th> <! –– INNER JOIN TABLES to CHILD ITR ––> 
                                <th class="col">Fathername</th>
                                <th class="col">Place Delivery</th>
                                <th class="col">Attended by:</th>
                                <th class="col">Birth Order</th>
                                <th class="col">Breastfed</th>
                                <th class="col">Mixed</th>
                                <th class="col">Date of NBS</th>
                                <th class="col">Date</th>

                            </tr>
                        </thead>
                            <tbody>
                                <?php
                                    //$result=mysqli_query($con, "SELECT itr.itr_ID, itr.itr_firstname, itr.itr_lastname, itr.itr_middleinitial, itr.itr_age, itr.itr_bday, itr.itr_gender, itr.itr_contactnumber, itr.itr_streetaddress, itr.itr_barangayaddress, itr.itr_municipalityaddress, itr.itr_medicalstatus, itr.itr_BHWassigned, itr.itr_philhealthnumber, itr.itr_philhealthstatus, itr.itr_philhealthmember, itr.itr_headoffamily, itr.itr_referralstatus, itr.itr_religion, itr.itr_ttstatus, itr.itr_datetime, child_itr.child_mothername, child_itr.child_fathername, child_itr.child_placedelivery	, child_itr.child_attendedby, child_itr.child_birthorder, child_itr.child_breastfed, child_itr.child_mixed, child_itr.child_dateofnbs, FROM itr INNER JOIN child_itr ON itr.itr_ID=child_itr.itr_IDfk");
                                    $result=mysqli_query($con, "SELECT * FROM itr INNER JOIN child_itr ON itr.itr_ID=child_itr.itr_IDfk");
                                    while($row=mysqli_fetch_array($result))
                                    {
                                        echo "<tr>";
                                            echo "<td>";    echo $row["itr_ID"];    echo "</td>";
                                            echo "<td>";    echo $row["itr_lastname"];    echo "</td>";
                                            echo "<td>";    echo $row["itr_firstname"];    echo "</td>";
                                            echo "<td>";    echo $row["itr_middleinitial"];    echo "</td>";
                                            echo "<td>";    echo $row["itr_age"];    echo "</td>";
                                            echo "<td>";    echo $row["itr_bday"];    echo "</td>";
                                            echo "<td>";    echo $row["itr_gender"];    echo "</td>";
                                            echo "<td>";    echo $row["itr_contactnumber"];    echo "</td>";
                                            echo "<td>";    echo $row["itr_streetaddress"];    echo "</td>";
                                            echo "<td>";    echo $row["itr_barangayaddress"];    echo "</td>";
                                            echo "<td>";    echo $row["itr_municipalityaddress"];    echo "</td>";
                                            echo "<td>";    echo $row["itr_medicalstatus"];    echo "</td>";
                                            echo "<td>";    echo $row["itr_BHWassigned"];    echo "</td>";
                                            echo "<td>";    echo $row["itr_philhealthnumber"];    echo "</td>";
                                            echo "<td>";    echo $row["itr_philhealthstatus"];    echo "</td>";
                                            echo "<td>";    echo $row["itr_philhealthmember"];    echo "</td>";
                                            echo "<td>";    echo $row["itr_headoffamily"];    echo "</td>";
                                            echo "<td>";    echo $row["itr_referralstatus"];    echo "</td>";
                                            echo "<td>";    echo $row["itr_religion"];    echo "</td>";
                                            echo "<td>";    echo $row["itr_ttstatus"];    echo "</td>";
                                            echo "<td>";    echo $row["child_mothername"];    echo "</td>";  //INNER JOIN to CHILD ITR
                                            echo "<td>";    echo $row["child_fathername"];    echo "</td>";
                                            echo "<td>";    echo $row["child_placedelivery"];    echo "</td>";
                                            echo "<td>";    echo $row["child_attendedby"];    echo "</td>";
                                            echo "<td>";    echo $row["child_birthorder"];    echo "</td>";
                                            echo "<td>";    echo $row["child_breastfed"];    echo "</td>";
                                            echo "<td>";    echo $row["child_mixed"];    echo "</td>";
                                            echo "<td>";    echo $row["child_dateofnbs"];    echo "</td>";
                                            echo "<td>";    echo $row["itr_datetime"];    echo "</td>";

                                        echo "</tr>";
                                    }
                                ?>

                            </tbody>
                    </table>
                </div>
            </div>
			</main>
		</section>
	</div>
</body>
</html>