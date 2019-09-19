<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/cb6426b160.js"></script>
</head>
<body class="text-center">
        <form action="routes.php" method="post" class="main">
            <img class="mb-4" src="images/brand.png" alt="brand" width="100" height="100">
            <div class="header">
                <h1 class="h2 mb-3 font-weight-normal">Please Login</h1>
            </div>
            <?php include 'errors.php' ?>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="email">
                        <i class="fa fa-envelope"></i>
                    </span>
                </div>
                <input type="email" class="form-control" placeholder="Email" aria-label="email" name="email" aria-describedby="email">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="password">
                    <i class="fa fa-lock"></i>
                    </span>
                </div>
                <input type="password" class="form-control" placeholder="Password" name="password" aria-label="password" aria-describedby="password">
            </div>

            <div class="checkbox mb-3">
            <label for="remember-me">
                    <input type="checkbox" value="remember-me" name="remember" 
                    <?php if(isset($_COOKIE["email"])) { ?> checked <?php } ?> >
                    <span class="font-weight-normal wh-tx"> Remember me </span>
            </label>
            </div>
            <div class="form-group">
                <button type="submit" name="login" class="btn btn-success btn-md btn-block">
                <span class="spinner-grow text-light spinner" role="status" role="status"></span> Login
                </button>
                <p class="mt-5 mb-3 text-light">&copy; <?php echo date('Y-m-d')?></p>
            </div>

        </form>
        <span class="text-center">
            <a href="forgot.php" class="li-lf">Forgot password?</a>
            <a href="signup.php" class="li-rg">Don't have an account?</a> 
        </span>
<!-- </div> -->
</body>
</html>
