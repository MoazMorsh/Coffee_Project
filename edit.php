<?php
global $conn;
session_start();
require 'classes\connect.php';
require 'classes/authentication.php';

use App\authentication;
$myauth = new authentication;
$myauth->auth();
$myauth->logOut();


?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Order Edit</title>
</head>
<body>

<div class="container mt-5">

    <?php include('classes\message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Order Edit
                        <a href="order.php" class="btn btn-danger float-end">BACK</a>
                        <a href="?logout=true" class="btn btn-danger float-end">Log out</a>

                    </h4>
                </div>
                <div class="card-body">

                    <?php
                    if(isset($_GET['id']))
                    {
                        $order_id = mysqli_real_escape_string($conn, $_GET['id']);
                        $query = "SELECT * FROM order_details WHERE order_id='$order_id' ";
                        $query_run = mysqli_query($conn, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            $order = mysqli_fetch_array($query_run);
                            ?>
                            <form action="classes\code.php" method="POST">
                                <input type="hidden" name="order_id" value="<?= $order['order_id']; ?>">

                                <div class="mb-3">
                                    <label>Customer Name</label>
                                    <input type="text" name="name" value="<?=$order['name'];?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Customer Email</label>
                                    <input type="email" name="email" value="<?=$order['email'];?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Customer Phone</label>
                                    <input type="text" name="phone" value="<?=$order['phone'];?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Order_items</label>
                                    <input type="text" name="order_items" value="<?=$order['order_items'];?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="update_order" class="btn btn-primary">
                                        Update Order
                                    </button>
                                </div>

                            </form>
                            <?php
                        }
                        else
                        {
                            echo "<h4>No Such Id Found</h4>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>