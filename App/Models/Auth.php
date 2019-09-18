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
                    return $this->validateUser($auth_user, $_REQUEST['password']);
                }
                throw new ErrorException('user not found');
            }
            throw new ErrorException('Invalid Email');
        } catch (Exception $e) {
            echo $e->getMessage();
            error_log($e->getMessage());
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
            header("Location: welcome.php");
            die();
        }else {
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
            echo 'user authenticated';
            return true;
        }
        echo 'failed to authenticate user. Please check your username or password';
        return false;
    }
}
