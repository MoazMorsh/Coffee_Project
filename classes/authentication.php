<?php
namespace App;

require'connect.php';

class Authentication
{
    
    public function auth()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ../homepage.php');
        }
    }


    // used to prevent access of SignUp.php & SignUp.php pages when user is authenticated
    public function redirectIfAuth()
    {
        if (isset($_SESSION['user_id'])) {
            header('Location: ../order.php');
        }
    }


    // return true or false
    public function is_auth()
    {
        return isset($_SESSION['user_id']);
    }

    public function logOut()
    {
        // check if key ?logout= exists in URL
        if (isset($_GET['logout'])) {
            session_unset();
            session_destroy();
            header('Location: ../homepage.php');
        }
    }


        
    
    public function signin()
        
        {
            global $conn;
            if(isset($_POST['signIn'])){
                require 'connect.php';
                $email=$_POST['email'];
                $password=$_POST['password'];
                $password=md5($password) ;
            
                $sql="SELECT * FROM users WHERE email='$email' and password='$password'";
                $result=$conn->query($sql);
            if($result->num_rows==1){
                session_start();
            
                $row=$result->fetch_assoc();
                $_SESSION['email']=$row['email'];
                $_SESSION['user_id']=$row['id'];
                header("Location: ../order.php");
                exit();
            }
            else{
                echo "Not Found, Incorrect Email or Password";
            } }
        
        }
}
?>








