<?PHP
require_once("./controller/Auth.php");

$auth = new Auth();


$auth->SetWebsiteName('www.danieladaise.com');


$auth->SetAdminEmail('adaisedaniel@gmail.com');


$auth->InitDB(/*hostname*/'localhost',
                      /*username*/'root',
                      /*password*/'auth_system_db',
                      /*database name*/'testdb',
                      /*table name*/'table1');


$auth->SetRandomKey('qSRcVS6DrTzrPvr');

?>