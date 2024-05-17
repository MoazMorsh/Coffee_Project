<?php
require('./vendor/autoload.php');
use App\Authentication;
$myauth = new Authentication;
$myauth->redirectIfAuth();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE-edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Coffee </title>
        <!-- Main template css file -->
        <link rel="stylesheet" href="style.css"/>
        <!--font awesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    </head>
    <body>
        <header class="header">
        <nav class="navbar">
            <a href="" class="logo">
                <img src="Images/logo.png" alt="logo" width="150px" height="100px">
            </a>
            <div class="navs" id="links">
                <i class="fas fa-times" onclick="HideMenu()"></i>
                <ul>  
                    
                    <li><a href="" class="nav-items">About US</a></li>
                    <li><a href="" class="nav-items">Menu</a></li>
                    <li><a href="" class="nav-items">Contact</a></li>
                </ul>
              
            </div>
                <i class="fas fa-bars" onclick="ShowMenu()"></i>
        </nav>

        </header>
        <section class="logout">
            <div class="content">
                <h1 class="title">fresh<span> coffee</span> in the<span> morning</span></h1>
                <p class="description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veritatis non quisquam tempore odio officia ut, veniam saepe harum id soluta!</p>
                <a href="index1.php" class="btn">get started</a>
            </div>

        </section>
        <footer >
            <h1>Our Menu</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, veniam.</p>
        </footer>
        <script>
            var navlinks=document.getElementById("links")
                function ShowMenu(){
                    navlinks.style.right="0";
                }
                function HideMenu(){
                    navlinks.style.right="-200px";
                }
        </script>
    </body>
</html>