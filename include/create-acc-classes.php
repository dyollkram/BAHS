<?php
    include('db.php');
    class Createacc extends Dbh
    {
        protected function setUser($firstname,$lastname,$middleinitial,$email,$username,$password,$contact,$address,$birthday,$gender)
        {
            $stmt = $this->connect()->prepare('INSERT INTO user (user_firstname, user_lastname, user_middleinitial, user_email, user_username, user_password, user_contactnumber, user_address, user_bday, user_gender) VALUES(?,?,?,?,?,?,?,?,?,?);');

            $stmt->execute(array($fname,$lname,$mi,$mail,$uname,$psw,$cntct,$addrss,$bday,$gndr));
            $oneid = $this->connect()->lastInsertId();
            $stmt = $this->connect()->prepare("INSERT INTO usertype (user_ID,usertype_name) VALUES(?,?)");
            $stmt->execute(array($oneid,$utypename));
            
        }







       
    //include('db.php'); 
    
    //if(isset($_POST["action"]))
   //{
    //    $firstname= $_POST['firstname'];
    //    $lastname= $_POST['lastname'];
    //    $middleinitial= $_POST['middleinitial'];
    //    $email= $_POST['email'];
    //    $username= $_POST['username'];
    //    $password= $_POST['password'];
    //    $contact= $_POST['contact'];
    //    $address= $_POST['address'];
    //    $birthday= $_POST['birthday'];
    //    $gender= $_POST['gender'];
	//	$usertypename= $_POST['usertypename']; //USER TYPE foreign key USERTYPEID

    //    $stmt = $connection->prepare("INSERT INTO user (user_firstname, user_lastname, user_middleinitial, user_email, user_username, user_password,
    //    user_contactnumber, user_address, user_bday, user_gender) VALUES(?,?,?,?,?,?,?,?,?,?)");

    //    $stmt->execute([$firstname,$lastname,$middleinitial,$email,$username,$password,$contact,$address,
    //    $birthday,$gender]);

    //    $oneid = $connection->lastInsertId();
    //    $stmt = $connection->prepare("INSERT INTO usertype (user_ID,usertype_name) 
    //    VALUES(?,?)");
    //    $stmt->execute([$oneid,$usertypename]);
    //    echo 'Successfully Created!';
                                            
		
    //}


    //<?php 

    }