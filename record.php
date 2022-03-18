<?php
    include('db.php'); 
?>
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
				<a id="logout" href="login.html"> <img src="./image/logout.png"> </a>
			</div>
            <div class="body">
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
                <br>
                <div class="container table-responsive text-nowrap" style="overflow-x: auto;">
                    <h3>Adult ITR</h3>           
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
                                <th class="col">Child Number</th> <! –– INNER JOIN TABLES to Adult ITR ––> 
                                <th class="col">Weight</th>
                                <th class="col">Height</th>
                                <th class="col">Temperature</th>
                                <th class="col">Heart Rate</th>
                                <th class="col">Respiratory</th>
                                <th class="col">Hypertension</th>
                                <th class="col">BP</th>
                                <th class="col">Waist Circumference</th>
                                <th class="col">Date</th>

                            </tr>
                        </thead>
                            <tbody>
                                <?php
                                    //$result=mysqli_query($con, "SELECT itr.itr_ID, itr.itr_firstname, itr.itr_lastname, itr.itr_middleinitial, itr.itr_age, itr.itr_bday, itr.itr_gender, itr.itr_contactnumber, itr.itr_streetaddress, itr.itr_barangayaddress, itr.itr_municipalityaddress, itr.itr_medicalstatus, itr.itr_BHWassigned, itr.itr_philhealthnumber, itr.itr_philhealthstatus, itr.itr_philhealthmember, itr.itr_headoffamily, itr.itr_referralstatus, itr.itr_religion, itr.itr_ttstatus, itr.itr_datetime, child_itr.child_mothername, child_itr.child_fathername, child_itr.child_placedelivery	, child_itr.child_attendedby, child_itr.child_birthorder, child_itr.child_breastfed, child_itr.child_mixed, child_itr.child_dateofnbs, FROM itr INNER JOIN child_itr ON itr.itr_ID=child_itr.itr_IDfk");
                                    $result=mysqli_query($con, "SELECT * FROM itr INNER JOIN adult_itr ON itr.itr_ID=adult_itr.itr_IDfk");
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
                                            echo "<td>";    echo $row["adult_childnumber"];    echo "</td>";  //INNER JOIN to Adult ITR
                                            echo "<td>";    echo $row["adult_weight"];    echo "</td>";
                                            echo "<td>";    echo $row["adult_height"];    echo "</td>";
                                            echo "<td>";    echo $row["adult_temperature"];    echo "</td>";
                                            echo "<td>";    echo $row["adult_heartrate"];    echo "</td>";
                                            echo "<td>";    echo $row["adult_respiratory"];    echo "</td>";
                                            echo "<td>";    echo $row["adult_hypertension"];    echo "</td>";
                                            echo "<td>";    echo $row["adult_bp"];    echo "</td>";
                                            echo "<td>";    echo $row["adult_waistcircumference"];    echo "</td>";
                                            echo "<td>";    echo $row["itr_datetime"];    echo "</td>";

                                        echo "</tr>";
                                    }
                                ?>

                            </tbody>
                    </table>
                </div>
                <br>
                <div class="container table-responsive text-nowrap" style="overflow-x: auto;">
                    <h3>Clinic Referral</h3>           
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
                                <th class="col">Status</th> <! –– INNER JOIN TABLES to Clinic Referral ––> 
                                <th class="col">Chief Complaints</th>
                                <th class="col">Surgical Operation</th>
                                <th class="col">Drug Allergy</th>
                                <th class="col">Last Meal</th>
                                <th class="col">Impression</th>
                                <th class="col">Action Taken</th>
                                <th class="col">Health Insurance</th>
                                <th class="col">Reason</th>
                                <th class="col">Date</th>

                            </tr>
                        </thead>
                            <tbody>
                                <?php
                                    //$result=mysqli_query($con, "SELECT itr.itr_ID, itr.itr_firstname, itr.itr_lastname, itr.itr_middleinitial, itr.itr_age, itr.itr_bday, itr.itr_gender, itr.itr_contactnumber, itr.itr_streetaddress, itr.itr_barangayaddress, itr.itr_municipalityaddress, itr.itr_medicalstatus, itr.itr_BHWassigned, itr.itr_philhealthnumber, itr.itr_philhealthstatus, itr.itr_philhealthmember, itr.itr_headoffamily, itr.itr_referralstatus, itr.itr_religion, itr.itr_ttstatus, itr.itr_datetime, child_itr.child_mothername, child_itr.child_fathername, child_itr.child_placedelivery	, child_itr.child_attendedby, child_itr.child_birthorder, child_itr.child_breastfed, child_itr.child_mixed, child_itr.child_dateofnbs, FROM itr INNER JOIN child_itr ON itr.itr_ID=child_itr.itr_IDfk");
                                    $result=mysqli_query($con, "SELECT * FROM itr INNER JOIN clinic_referral ON itr.itr_ID=clinic_referral.itr_IDfk");
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
                                            echo "<td>";    echo $row["referral_status"];    echo "</td>";  //INNER JOIN to Clinic Referral
                                            echo "<td>";    echo $row["referral_chiefcomplaints"];    echo "</td>";
                                            echo "<td>";    echo $row["referral_surgicaloperation"];    echo "</td>";
                                            echo "<td>";    echo $row["referral_drugallergy"];    echo "</td>";
                                            echo "<td>";    echo $row["referral_lastmeal"];    echo "</td>";
                                            echo "<td>";    echo $row["referral_impression"];    echo "</td>";
                                            echo "<td>";    echo $row["referral_actiontaken"];    echo "</td>";
                                            echo "<td>";    echo $row["referral_healthinsurance"];    echo "</td>";
                                            echo "<td>";    echo $row["referral_reason"];    echo "</td>";
                                            echo "<td>";    echo $row["itr_datetime"];    echo "</td>";

                                        echo "</tr>";
                                    }
                                ?>

                            </tbody>
                    </table>
                </div>
                <br>
                <div class="container table-responsive text-nowrap" style="overflow-x: auto;">
                    <h3>Prenatal Form</h3>           
                    <table class="table table-hover">
                        <thead>
                            <tr>                            
                                <th class="col">ID</th>
                                <th class="col">Lastname</th>
                                <th class="col">Firstname</th>
                                <th class="col">MiddileInitial</th>
                                <th class="col">Age</th>
                                <th class="col">Birthday</th>
                                <th class="col">Contact</th>
                                <th class="col">StreetAddress</th>
                                <th class="col">BarangayAddress</th>
                                <th class="col">MunicipalityAddress</th>
                                <th class="col">Civil Status</th>
                                <th class="col">BHW Assigned</th>
                                <th class="col">Philhealth #</th>
                                <th class="col">Philhealth Status</th>
                                <th class="col">Philhealth Member</th>
                                <th class="col">Religion</th>
                                <th class="col">T.T Status</th>
                                <th class="col">Gravida</th>
                                <th class="col">Term Birth</th>
                                <th class="col">Preterm Birth</th>
                                <th class="col">Abortion</th>
                                <th class="col">Child #</th>
                                <th class="col">Last Menstrual Period</th>
                                <th class="col">Expected due date</th>
                                <th class="col">Last delivery date</th>
                                <th class="col">Date</th>
                                <th class="col">Age of Gestation</th>
                                <th class="col">Weight</th>
                                <th class="col">Height</th>
                                <th class="col">Temperature</th>
                                <th class="col">BP</th>
                                <th class="col">BMI</th>
                                <th class="col">Fundal Height</th>
                                <th class="col">Transcutaneous Bilirubin(TcB)</th>
                                

                            </tr>
                        </thead>
                            <tbody>
                                <?php
                                    //$result=mysqli_query($con, "SELECT itr.itr_ID, itr.itr_firstname, itr.itr_lastname, itr.itr_middleinitial, itr.itr_age, itr.itr_bday, itr.itr_gender, itr.itr_contactnumber, itr.itr_streetaddress, itr.itr_barangayaddress, itr.itr_municipalityaddress, itr.itr_medicalstatus, itr.itr_BHWassigned, itr.itr_philhealthnumber, itr.itr_philhealthstatus, itr.itr_philhealthmember, itr.itr_headoffamily, itr.itr_referralstatus, itr.itr_religion, itr.itr_ttstatus, itr.itr_datetime, child_itr.child_mothername, child_itr.child_fathername, child_itr.child_placedelivery	, child_itr.child_attendedby, child_itr.child_birthorder, child_itr.child_breastfed, child_itr.child_mixed, child_itr.child_dateofnbs, FROM itr INNER JOIN child_itr ON itr.itr_ID=child_itr.itr_IDfk");
                                    $result=mysqli_query($con, "SELECT * FROM prenatal");
                                    while($row=mysqli_fetch_array($result))
                                    {
                                        echo "<tr>";
                                            echo "<td>";    echo $row["prenatal_ID"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_lastname"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_firstname"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_middleinitial"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_age"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_bday"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_contactnumber"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_streetaddress"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_barangayaddress"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_municipalityaddress"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_civilstatus"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_BHWassigned"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_philhealthnumber"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_philhealthstatus"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_philhealthmember"];    echo "</td>";;
                                            echo "<td>";    echo $row["prenatal_religion"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_ttstatus"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_gravida"];    echo "</td>";  
                                            echo "<td>";    echo $row["prenatal_termbirth"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_preterm"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_abortion"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_livingchildren"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_lmp"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_edc"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_dateoflastdelivery"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_date"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_aog"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_weight"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_height"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_temperature"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_bp"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_bmi"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_fh"];    echo "</td>";
                                            echo "<td>";    echo $row["prenatal_tcb"];    echo "</td>";
                                            

                                        echo "</tr>";
                                    }
                                ?>

                            </tbody>
                    </table>
                </div>
                <br>
                <div class="container table-responsive text-nowrap" style="overflow-x: auto;">
                    <h3>Family Planning</h3>           
                    <table class="table table-hover">
                        <thead>
                            <tr>                            
                                <th class="col">ID</th>
                                <th class="col">Lastname</th>
                                <th class="col">Firstname</th>
                                <th class="col">MiddileInitial</th>
                                <th class="col">Birthdate</th>
                                <th class="col">Educational</th>
                                <th class="col">Occupation</th>
                                <th class="col">Spouse Lastname</th>
                                <th class="col">Spouse Firstname</th>
                                <th class="col">Spouse MiddileInitial</th>
                                <th class="col">Spouse Birthdate</th>
                                <th class="col">Spouse Educational</th>
                                <th class="col">Spouse Occupation</th>
                                <th class="col">Street Address</th>
                                <th class="col">Barangay Address</th>
                                <th class="col">Municipality Address</th>
                                <th class="col">Province Address</th>
                                <th class="col">Income</th>
                                <th class="col">Method Accepted</th>
                                <th class="col">Medical History</th>
                                <th class="col">Obstetrical History</th>
                                <th class="col">Physical EXamination</th>
                                <th class="col">Pelvic Examination</th>
                            </tr>
                        </thead>
                            <tbody>
                                <?php
                                    //$result=mysqli_query($con, "SELECT itr.itr_ID, itr.itr_firstname, itr.itr_lastname, itr.itr_middleinitial, itr.itr_age, itr.itr_bday, itr.itr_gender, itr.itr_contactnumber, itr.itr_streetaddress, itr.itr_barangayaddress, itr.itr_municipalityaddress, itr.itr_medicalstatus, itr.itr_BHWassigned, itr.itr_philhealthnumber, itr.itr_philhealthstatus, itr.itr_philhealthmember, itr.itr_headoffamily, itr.itr_referralstatus, itr.itr_religion, itr.itr_ttstatus, itr.itr_datetime, child_itr.child_mothername, child_itr.child_fathername, child_itr.child_placedelivery	, child_itr.child_attendedby, child_itr.child_birthorder, child_itr.child_breastfed, child_itr.child_mixed, child_itr.child_dateofnbs, FROM itr INNER JOIN child_itr ON itr.itr_ID=child_itr.itr_IDfk");
                                    $result=mysqli_query($con, "SELECT * FROM family_planning");
                                    while($row=mysqli_fetch_array($result))
                                    {
                                        echo "<tr>";
                                            echo "<td>";    echo $row["famplan_ID"];    echo "</td>";
                                            echo "<td>";    echo $row["famplan_clientlastname"];    echo "</td>";
                                            echo "<td>";    echo $row["famplan_clientfirstname"];    echo "</td>";
                                            echo "<td>";    echo $row["famplan_clientmiddleinitial"];    echo "</td>";
                                            echo "<td>";    echo $row["famplan_clientbdate"];    echo "</td>";
                                            echo "<td>";    echo $row["famplan_clienteducational"];    echo "</td>";
                                            echo "<td>";    echo $row["famplan_clientoccupation"];    echo "</td>";
                                            echo "<td>";    echo $row["famplan_spouselastname"];    echo "</td>";
                                            echo "<td>";    echo $row["famplan_spousefirstname"];    echo "</td>";
                                            echo "<td>";    echo $row["famplan_spousemiddileinitial"];    echo "</td>";
                                            echo "<td>";    echo $row["famplan_spousebdate"];    echo "</td>";
                                            echo "<td>";    echo $row["famplan_spouseeducational"];    echo "</td>";
                                            echo "<td>";    echo $row["famplan_spouseoccupation"];    echo "</td>";
                                            echo "<td>";    echo $row["famplan_streetaddress"];    echo "</td>";
                                            echo "<td>";    echo $row["famplan_barangayaddress"];    echo "</td>";;
                                            echo "<td>";    echo $row["famplan_municipalityaddress"];    echo "</td>";
                                            echo "<td>";    echo $row["famplan_provinceaddress"];    echo "</td>";
                                            echo "<td>";    echo $row["famplan_income"];    echo "</td>";  
                                            echo "<td>";    echo $row["famplan_methodaccepted"];    echo "</td>";
                                            echo "<td>";    echo $row["famplan_medicalhistory"];    echo "</td>";
                                            echo "<td>";    echo $row["famplan_obstetricalhistory"];    echo "</td>";
                                            echo "<td>";    echo $row["famplan_physicalexamination"];    echo "</td>";
                                            echo "<td>";    echo $row["famplan_pelvicexam"];    echo "</td>";
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