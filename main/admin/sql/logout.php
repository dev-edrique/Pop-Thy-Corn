<!DOCTYPE html>
<html>
    <head>
        <title>Logout</title>
    </head>

    <body>
        <?php 
        session_start();
        unset($_SESSION['admin_id']);

        echo "Logging out...";
        echo "<script> alert('Employee logged out!');
        window.location.href = '../admin_login.php';
        </script>";
        ?>
    </body>
</html>