<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forget Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/forget.css">
    <script src="https://kit.fontawesome.com/cb6426b160.js"></script>

</head>
 <body class="text-center">
                <form action="routes.php" method="post" class="main">
                    <img class="mb-4" src="images/brand.png" alt="brand" width="100" height="100">
                    <div class="header">
                        <h1 class="h2 mb-3 font-weight-normal text-dark">Reset Password</h1>
                    </div>
                    <?php include 'errors.php' ?>
                    <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="email"> 
                                    
                                    <i class="fa fa-envelope"></i>
                                </span>
                            </div>
                            
                            <input type="email" class="form-control" placeholder="Email" aria-label="email" name="email" aria-describedby="email" require>
                        </div>
    
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="password">
                            <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <input type="password" class="form-control" minlength="8" placeholder="Password" name="password" aria-label="password" aria-describedby="password" require>
                        <small class="form-text text-dark">The password must be 8 characters minimum</small>
                    </div>

                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="password">
                                    <i class="fa fa-lock"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" minlength="8" placeholder="Confirm Password" name="confirm" aria-label="password" aria-describedby="password" require>
                                <small class="form-text text-dark">Confrim password must be the same as password</small>
                            </div>
        
                    <div class="form-group"> 
                        <button type="submit" name="reset" class="btn btn-success btn-md btn-block">
                        <span class="spinner-grow text-light spinner" role="status" role="status"></span> Reset Password
                        </button>
                        <p class="mt-5 mb-3 text-light">&copy; <?php echo date('Y-m-d')?></p>
                    </div>
                </form>
                <span class="text-center">
                    <a href="index.php" class="lo-g">Return to login page</a>
                </span>
       
</body>
</html>