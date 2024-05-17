<?php
namespace App;

require'connect.php';

class authentication{
    function admin()
    {
        global $conn;
        if (isset($_POST['signIn'])) {
            $email = ($_POST['email'] === 'admin@gmail.com');
            $password = $_POST['password'];
            $password = md5($password);

            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                session_start();

                $row = $result->fetch_assoc();
                $_SESSION['email'] = $row['email'];
                header("Location: order.php");
                exit();
            } else {
                echo "Not Found, Incorrect Email or Password";
            }

        }
    }
}
?>








