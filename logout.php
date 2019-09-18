<?php
    session_start();
    session_unset();
    session_destroy(); 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
    <?php include 'css/style.css'; ?>
</head>
<body>
    <div class="logout">
        <?php 
            
          	header("location: index.php");
        ?>
    </div>
</body>
</html>