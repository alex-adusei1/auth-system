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
	function SetAdminEmail($email)
    {
        $this->admin_email = $email;
    }
    
    function SetWebsiteName($sitename)
    {
        $this->sitename = $sitename;
    }
    
    function SetRandomKey($key)
    {
        $this->rand_key = $key;
    }
	function LogOut()
    {
        session_start();
        
        $sessionvar = $this->GetLoginSessionVar();
        
        $_SESSION[$sessionvar]=NULL;
        
        unset($_SESSION[$sessionvar]);
    }
	 function GetLoginSessionVar()
    {
        $retvar = md5($this->rand_key);
        $retvar = 'usr_'.substr($retvar,0,10);
        return $retvar;
    }
}

$auth = new Auth();
$auth->doLogin('lex@email.com','lex@123');
