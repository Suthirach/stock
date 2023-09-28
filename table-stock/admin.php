<?php
    session_start();
    require_once 'config/db.php';
    // require_once 'table-stock/config.php';

    if (!isset($_SESSION['admin_login'])){
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header('location: signin.php');

        
    }

    
    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
    <div class="container">
        <?php
            if(isset($_SESSION['admin_login'])){
                $admin_login = $_SESSION['admin_login'];
                $stmt = $conn->query("SELECT * FROM users WHERE id = $admin_login");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        ?>
        <h3 class="mt-4">Welcome Admin : <?php echo $row['firstname']. ' ' . $row['lastname']?></h3>

        <a href="logout.php" class="btn btn-danger">Logout</a>
        <style>
            .container {
            display: -webkit-box;
            /* margin-right:-2rem ; */
            }
            .container a {
                margin-top: 1.4rem;
                margin-left:1rem ;
            }
        </style>
    </div>
    
<body>
    <div class="container">
        <style>
        .container {
            display: block;
        }
        </style>
        <?php
            require_once 'index.php';
        ?>
     </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>
</html>