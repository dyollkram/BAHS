<?php
    include('db.php');    

    if(isset($_POST["insert"]))
    {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $skills = $_POST['skills'];//CHILD ITR JOIN THE TABLE INSERT
        //$itrfk =

            
           // $sql = "INSERT INTO sample_one (name, address, gender) 
            //VALUES('$name','$address','$gender')";
            
            $sql2 = "INSERT INTO sample_two (one_idfk, skill_one) 
            VALUES ('$mysqli->insert_id','$skills')";
            $query= mysqli_query($con, $sql2) or die (mysqli_error($con));
            echo 'Your form was successfully submitted!';                                           
    }
?>