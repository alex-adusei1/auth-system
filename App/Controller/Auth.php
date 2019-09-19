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
    public function doLogout()
	{
		session_start();
		session_unset();
		session_destroy();  
		header("location: index.php");
        
    }
}
