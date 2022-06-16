<?php

    if(isset($_POST["action"]))
    {
        //Grabbing data

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

        // Instantiate Acc ctrl c
        include('db.php');
        include('include/create-acc-ctrl.php');
        include('include/create-acc-classes.php');
        $create = new Create ($firstname,$lastname,$middleinitial,$email,$username,$password,$contact,$address,$birthday,$gender,$usertypename);
                                            
		
    }
