<?php
session_start();
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

    <title>Order Create</title>
</head>
<body>

<div class="container mt-5">

    <?php include('classes\message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Order Add
                        <a href="order.php" class="btn btn-danger float-end">BACK</a>
                        <input type="submit" class="btn" value="Log out" name="logout">
                    </h4>
                </div>
                <div class="card-body">
                    <form action="classes/code.php" method="POST">

                        <div class="mb-3">
                            <label>Customer Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Customer Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Customer Phone</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Order-items</label>
                            <input type="text" name="order_items" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="save_order" class="btn btn-primary">Save Order</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>