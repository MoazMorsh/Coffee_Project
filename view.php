<?php
global $conn;
require 'connect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Order View</title>
</head>
<body>

<div class="container mt-5">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Order View Details
                        <a href="order.php" class="btn btn-danger float-end">BACK</a>
                        <a href="homepage.php" class="btn btn-primary float-end">logout</a>
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

                            <div class="mb-3">
                                <label>Customer Name</label>
                                <p class="form-control">
                                    <?=$order['name'];?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Customer Email</label>
                                <p class="form-control">
                                    <?=$order['email'];?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Customer Phone</label>
                                <p class="form-control">
                                    <?=$order['phone'];?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Order-items</label>
                                <p class="form-control">
                                    <?=$order['order_items'];?>
                                </p>
                            </div>

                            <?php
                        }
                        else
                        {
                            echo "<h4>No Such ID Found</h4>";
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