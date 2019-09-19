<?php include 'checker.php' ?>
<!-- Bootstrap Version -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authsys</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/welcome.css">
    <script src="https://kit.fontawesome.com/cb6426b160.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Authsys</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          </ul>
          <div class="form-inline my-2 my-lg-0">
           <i class="fas fa-user"></i> <?php echo ucwords($_SESSION['auth_user']->fullname)?> 
           <span class="pl-3">
             <a href="index.php" class="btn btn-outline-secondary btn-md my-2 my-sm-0">Log Out</a>
          </span>
        </div>
        </div>
      </nav>

  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Welcome!</h1>
        <p class="lead">To Authsys User <?php echo ucwords($_SESSION['auth_user']->fullname)?></p>
        <p class="lead">Created With Love By Team Code Titans</p>
      </div>
    </div>
  </div>
</body>
</html>