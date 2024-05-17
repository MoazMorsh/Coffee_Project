<?php

global $conn;
session_start();
require 'classes\connect.php';

if (isset($_POST['delete_order'])) {
    $order_id = mysqli_real_escape_string($conn, $_POST['delete_order']);

    $query = "DELETE FROM order_details WHERE order_id='$order_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "Order Deleted Successfully";
        header("Location: order.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Order Not Deleted";
        header("Location: order.php");
        exit(0);
    }
}

if (isset($_POST['update_order'])) {
    $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $order_items = mysqli_real_escape_string($conn, $_POST['order_items']);

    $query = "UPDATE order_details SET name='$name', email='$email', phone='$phone', order_items='$order_items' WHERE order_id='$order_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "Order Updated Successfully";
        header("Location: order.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Order Not Updated";
        header("Location: order.php");
        exit(0);
    }

}


if (isset($_POST['save_order'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $order_items = mysqli_real_escape_string($conn, $_POST['order_items']);

    $query = "INSERT INTO order_details (name,email,phone,order_items) VALUES ('$name','$email','$phone','$order_items')";

    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        $_SESSION['message'] = "Order Created Successfully";
        header("Location: order.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Order Not Created";
        header("Location: create.php");
        exit(0);
    }
}

