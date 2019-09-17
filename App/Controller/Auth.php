<?php

include '../Models/User.php';

class Auth
{
    public function __construct()
    {
        $this->user = new User();
    }

    public function doLogin($email, $password)
    {
        $auth_user = $this->user->getWhere(['email'=> $email]);

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

    private function validateUser($auth_user, $password): bool{
        if ($auth_user->password == $password) {
            echo 'user authenticated';
            return true;
        }
        echo 'failed to authenticate user. Please check your username or password';
        return false;
    }
}
