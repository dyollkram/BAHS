<?php
    include('db.php'); 
    
    if(isset($_POST["insert"]))
    {

        $name = $_POST['name'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $skills = $_POST['skills'];//CHILD ITR JOIN THE TABLE INSERT
        //$itrfk =
        $stmt = $connection->prepare("INSERT INTO sample_one (name, address, gender) VALUES(?,?,?)");
        $stmt->execute([$name,$address,$gender]);

        $oneID = $connection->lastInsertId();
        $stmt = $connection->prepare("INSERT INTO sample_two (one_id, skill_one) VALUES(?,?)");
        $stmt->execute([$oneID,$skills]);
        echo 'Your form was successfully submitted!';

            
          //  $sql = "INSERT INTO sample_one (name, address, gender) 
            //VALUES('$name','$address','$gender')";
            
                
                //$lastID = "SELECT LAST_INSERTED_ID()";
               // $last_id_in_table1 = LAST_INSERT_ID();

               // if($query == TRUE)
               // {
                    //$sql2 = "INSERT INTO sample_one (one_idfk, skill_one) 
                    //VALUES ('$mysql->insert_id','$skills')";
                    //$query= mysqli_query($con, $sql) or die (mysqli_error($con));
                    //echo 'Your form was successfully submitted!';
                    
                //}
                //else
                //{
                   // echo 'There was an error in submitting your form';
                //

                                                
    }
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
                <div class="container">
                
                <h2>Primary connected to foreign</h2>
                    <!--<form action="" name="adultform" method="POST"> -->
                    <form action="" name="one" method="POST">  
                    <div class="row">
                        <div class="form-group">
                            <label for="name">Name:</label>
                                <input type="text" class="form-control" id="Name" placeholder="Enter your Name" name="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="add">Address:</label>
                                <input type="text" class="form-control" id="Address" placeholder="Enter your address" name="address">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="gender">Gender:</label>
                                <input type="text" class="form-control" id="Gender" placeholder="Enter your gender" name="gender">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="skills">Skills:</label>
                                <input type="text" class="form-control" id="Skills" placeholder="Enter your skills" name="skills">
                        </div>
                    </div>
                        
                            <div class="checkbox">
                                <label><input type="checkbox" name="remember"> Remember me</label>
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
                    <h3>TWO sample</h3>           
                    <table class="table table-hover">
                        <thead>
                            <tr>                            
                                <th class="col">ID</th>
                                <th class="col">Name</th>
                                <th class="col">Address</th>
                                <th class="col">Gender</th>
                                <th class="col">Skills</th>

                            </tr>
                        </thead>
                            <tbody>
                                <?php
                                    //$output = array();
                                    $stmt = $connection->prepare("SELECT * FROM sample_one INNER JOIN sample_two ON sample_one.one_id=sample_two.one_id");
                                    $stmt->execute();
                                    $result = $stmt->fetchAll();

                                    foreach($result as $row)
                                    {
                                        echo "<tr>";
                                            echo "<td>";    echo $row["one_id"];    echo "</td>";
                                            echo "<td>";    echo $row["name"];    echo "</td>";
                                            echo "<td>";    echo $row["address"];    echo "</td>";
                                            echo "<td>";    echo $row["gender"];    echo "</td>";
                                            echo "<td>";    echo $row["skill_one"];    echo "</td>"; //INNER JOIN from ONE to TWO
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
                </div>
            </div>
			</main>
		</section>
	</div>
</body>
</html>