<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
global $conn;
require 'classes/authentication.php';
use App\authentication;
$myauth = new authentication;
$myauth->redirectIfAuth();
$myauth->signin();

include 'classes/connect.php';

if(!$myauth->is_auth()){
    
    if(isset($_POST['signUp'])){
        $firstName=$_POST['fName'];
        $lastName=$_POST['lName'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $password=md5($password);
    
         $checkEmail="SELECT * From users where email='$email'";
         $result=$conn->query($checkEmail);
         if($result->num_rows>0){
            echo "Email Address Already Exists !";
         }
         else{
            $insertQuery="INSERT INTO users(firstName,lastName,email,password)
                           VALUES ('$firstName','$lastName','$email','$password')";
                if($conn->query($insertQuery)==TRUE){
                    header("location: index1.php");
                }
                else{
                    echo "Error:".$conn->error;
                }
         }
    }



}


?>
