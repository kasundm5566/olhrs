<?php

include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();
$GLOBALS['connection'] = $connection;

//To create a login class
class login {

    function loginvalidate($username, $password) {
        $connection = $GLOBALS['connection'];
        
        $sql = "SELECT username,group_name FROM user u,groups g WHERE u.group_id=g.group_id "
                . "AND BINARY u.username='$username' AND password='$password';";
        $result = $connection->query($sql); //To execute query
        return $result;
    }

    function log($date, $time, $username, $sessionId) { //To Insert login Details
        $con = new mysqli("127.0.0.1", "root", "", "olhrs"); //Conncection string
        $sql = "INSERT INTO log (log_date,log_time,username,session_id) VALUES('$date','$time','$username','$sessionId');";
        $con->query($sql);
    }

    function getUserGroup($username) {
        $con = new mysqli("127.0.0.1", "root", "", "olhrs"); //Conncection string
        $sql = "SELECT group_name FROM groups WHERE group_id IN (SELECT group_id FROM user WHERE username='$username');";

        $result = $con->query($sql);
        return $result;
    }

}

?>
