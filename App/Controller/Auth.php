<?php

include 'App/Models/User.php';

class Auth
{
    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * checks and validate incoming logins
     */
    public function doLogin()
    {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $auth_user = $this->user->getWhere(['email' => $email]);

        try {
            if ($auth_user) {
                return $this->validateUser($auth_user, $password);
            }
            throw new ErrorException('user not found');
        } catch (Exception $e) {
            echo $e->getMessage();
            error_log($e->getMessage());
        }
    }

    /**
     * Create a new record
     */
    public function doSignUp(array $data)
    {
        $this->user->save($data);
    }

    /**
     * Validate login user
     */
    private function validateUser($auth_user, $password): bool
    {
        if (password_verify($password, $auth_user->password)) {
            echo 'user authenticated';
            return true;
        }
        echo 'failed to authenticate user. Please check your username or password';
        return false;
    }


    //Remember me  
    public function rememberMe()
    {
        // if(isset($_POST['email']) && isset($_POST["password"]))
        if($auth_user)
        {
            if(!empty($_POST["remember"]))
            {
                setcookie("email", $_POST["email"], time() + (30 * 24 * 60 * 60));
                setcookie("password", $_POST["password"], time() + (30 * 24 * 60 * 60));
            }
            else
            {
                if(isset($_COOKIE["email"]))
                {
                    setcookie("email", "");
                }
                if(isset($_COOKIE["password"]))
                {
                    setcookie("password", "");
                }
            }
            header("location:index.php");
        }
    }

}