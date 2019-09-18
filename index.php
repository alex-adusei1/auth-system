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
<body class="mg-tp">
    <div class="login">
        <form action="routes.php" method="post">
            <span class="img-sp">
                <img class="mb-4" src="images/brand.png" alt="brand" width="100" height="100">
            </span>
                <div class="header">
                <h1 class="h2 mb-3 font-weight-normal">Please Login</h1>
            </div>

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
                <label>
                    <input type="checkbox" value="remember-me">
                    <span class="font-weight-normal wh-tx"> Remember me </span>
                </label>
            </div>
            <div class="form-group">
                <button type="submit" name="login" class="btn btn-success btn-lg btn-block">
                    Login
                </button>
            </div>

        </form>
        <span class="extras">
            <a href="#" class="li-lf">Forgot password?</a>
            <a href="#" class="li-rg">Don't have an account?</a>
        </span>
</body>
</html>
