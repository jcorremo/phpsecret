<?php 

class Connection
{
    public static function StartUp()
    {
        $pdo = new PDO('mysql:host=jcorremo.heliohost.org;dbname=jcorremo_secretfriends;charset=utf8', 'jcorremo_test', 'Jcorremo$2018');
        //$pdo-&gt;setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
}

?>