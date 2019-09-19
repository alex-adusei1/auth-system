<?php include 'checker.php' ?>
<!-- Raw HTML Version -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/welcome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Livvic|Open+Sans|Roboto|Rubik|Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gayathri|Heebo|Manjari|Montserrat|Poppins|Noto+Sans+JP|Noto+Sans+KR|Raleway&display=swap" rel="stylesheet">
    
</head>
<body>
    <div class="bg">
           <div class="flex">
               <div class="app">Authsys</div>
            <div> <i class="fa fa-user icon" style="font-size:40px"></i></div>
     
            </div>

    <div class="container">
          <div class="welcome">Welcome!</div>
          <div class="username"> 
          To Authsys <?php echo ucwords($_SESSION['auth_user']->fullname)?>
            </div>
          <div class="team">
                Created With Love By Team Code Titans
         </div>
    </div>
</div>
</body>
</html>