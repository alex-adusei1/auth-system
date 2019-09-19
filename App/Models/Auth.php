<?php

class Auth
{
    private static $instance;
    private $user;

    public static function getInstance()
    {
        if (!isset($instance)) {
            Auth::$instance = new Auth();
            return Auth::$instance;
        }
    }

    private function __construct()
    {
        $this->user = App::user();
        session_start();
    }

    /**
     * checks and validate incoming logins
     */
    public function doLogin()
    {
        try {
            $email = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
            $auth_user = $this->user->getWhere(['email' => $email]);

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if ($auth_user) {
                    if ($this->validateUser($auth_user, $_REQUEST['password'])) {
                        $_SESSION['auth_user'] = $auth_user;
                        header("Location:welcome.php");
                        die();
                    }
                    throw new ErrorException('Failed to authenticate user. <br> <small>Please check your <strong>username</strong> or <strong> password</strong> </small>');
                }
                throw new ErrorException('User not found');
            }
            throw new ErrorException('Invalid Email');
        } catch (Exception $e) {
            error_log($e->getMessage());
            $this->failedLogin($e->getMessage());
        }
    }

    public function doLogout()
    {
        //@todo
    }

    /**
     * Create a new record
     */
    public function doSignUp()
    {
        $request = array_filter($_REQUEST, function ($req) {
            return strlen($req) > 0;
        });

        if ($this->user->save($request)) {
            $_SESSION['auth_user'] = new User($request);
            header("Location:welcome.php");
            die();
        } else {
            header("Location: signup.php");
            die();
        }
    }

    /**
     * Validate login user
     */
    private function validateUser($auth_user, $password): bool
    {
        if (password_verify($password, $auth_user->password)) {
            
            return true;
        }
        return false;
    }

    private function failedLogin($error)
    {
        $_SESSION['errors'] = $error;
        header("Location:index.php");
    }
}