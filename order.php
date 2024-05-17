<?php
global $conn;
session_start();
require 'classes\connect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Coffee Order CRUD</title>
</head>
<body>

<div class="container mt-4">

    <?php include('classes\message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Order Details
                        <a href="create.php" class="btn btn-primary float-end">Add Order</a>
                        <a  href="homepage.php" class="btn btn-primary float-end">logout</a>
                    </h4>

                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Order-ID</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Order-item</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>


                        <?php
                        if(isset($_SESSION['email'])) {
                            $email = $_SESSION['email'];
                            $query = "SELECT * FROM order_details WHERE email = '$email'";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $order)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $order['order_id']; ?></td>
                                        <td><?= $order['name']; ?></td>
                                        <td><?= $order['email']; ?></td>
                                        <td><?= $order['phone']; ?></td>
                                        <td><?= $order['order_items']; ?></td>
                                        <td>
                                            <a href="view.php?id=<?= $order['order_id']; ?>" class="btn btn-info btn-sm">View</a>
                                            <a href="edit.php?id=<?= $order['order_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                            <form action="classes\code.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_order" value="<?=$order['order_id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                            
                                <?php
                            }
                        }
                        }
                        else
                        {
                            echo "<h5> No Record Found </h5>";
                        }
                        ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>