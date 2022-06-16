<?php
    include('create-acc-classes.php');
    class Create extends Createacc {
        private $fname;
        private $lname;
        private $mi;
        private $mail;
        private $uname;
        private $psw;
        private $cntct;
        private $addrss;
        private $bday;
        private $gndr;
        private $utypename;

        public function __construct($firstname,$lastname,$middleinitial,$email,$username,$password,$contact,$address,$birthday,$gender,$usertypename)
        {
            $this->fname = $firstname;
            $this->lname = $lastname;
            $this->mi = $middleinitial;
            $this->mail = $email;
            $this->uname = $username;
            $this->psw = $password;
            $this->cntct = $contact;
            $this->addrss = $address;
            $this->bday = $birthday;
            $this->gndr = $gender;
            $this->utypename = $usertypename;
            
        }
        public function Handler(){
            if($this->emptyInput() == false){
                header("location:account.php?error=emptyinput");
                exit();
            }
            if($this->invalidUname() == false){
                header("location:account.php?error=username");
                exit();
            }

        }

        private function emptyInput(){
            //$result;
            if(empty($this->fname) || empty($this->lname) || empty($this->mi) || empty($this->mail) || empty($this->uname) || empty($this->psw) || empty($this->cntct) || empty($this->addrss) || empty($this->bday) || empty($this->gndr) || empty($this->utypename)){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }

        private function invalidUname(){
            //$result;
            if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uname)){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;

        }
    }
?>