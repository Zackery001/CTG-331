<?php 
include_once 'Database.php';
class User extends Database{
    public function signup($username,$email,$password,$age){
        $sql = "INSERT INTO users(username,email,password,age)
            VALUES('$username','$email','$password','$age')";
        $this->exec($sql);
    }
    public function duplicateUser($username,$email){
        $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email' ";
        return $this->fetch($sql);
    }
    public function authentication($age,$email,$password){
        $current_year = 2023;
        if(isset($_POST['register'])){
            if($current_year-$age>=16){
                $accMail = ['email.com', 'gmail.com', 'yahoo.com'];
                $mail = explode('@',$email);
                if(strpos("$email", "@")==true && in_array(end($mail),$accMail)){
                    if(strlen($password)>=6){
                        echo "<p class='alert alert-success'>
                        Your account has been successfully created</p>";
                        return true;
                    }else{
                        echo "<p class='alert alert-warning'>
                        Password must be 8 characters long</p>";
                    }
                }else{
                    echo"<p class='alert alert-warning'>
                    Invalid Request. The mail format you entered is not supported</p>";
                }
            }else{
                echo "<p class='alert alert-danger'>
                You must be 16 or older to open an account.</p>";
            } 
        }
    }
    public function userLog($username,$password){
        $pass = md5($password);
        $sql = "SELECT * FROM users WHERE username = '$username' AND password ='$pass' ";
        return $this->fetch($sql);
    }

    public function logCheck($check){
         if(!isset($check)){
            header("location:login.php");
        }
    }

}
?>