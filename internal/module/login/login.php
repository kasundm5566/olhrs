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
                . "AND u.username='$username' AND password='$password';";
        $result = $connection->query($sql); //To execute query
        return $result;
    }

    function log($date, $time, $username, $sessionId) { //To Insert login Details
        $con = new mysqli("127.0.0.1", "root", "test123", "olhrs"); //Conncection string
        $sql = "INSERT INTO log (log_date,log_time,username,session_id) VALUES('$date','$time','$username','$sessionId');";
        $con->query($sql);
    }

    function getUserPermissions($username) {
        $con = new mysqli("127.0.0.1", "root", "test123", "olhrs"); //Conncection string
        $sql = "SELECT permission_name FROM permission WHERE permission_id IN "
                . "(SELECT permission_id FROM group_permission WHERE group_id IN "
                . "(SELECT group_id FROM groups WHERE group_id IN "
                . "(SELECT group_id FROM user u, user_group ug WHERE u.user_id=ug.user_id AND "
                . "username='$username')));";

        $result = $con->query($sql);
        return $result;
    }

}

?>
