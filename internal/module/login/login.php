<?php

include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();
$GLOBALS['connection'] = $connection;

//To create a login class
class login {

    function loginvalidate($username, $password) {
        $connection = $GLOBALS['connection'];
// $sql="SELECT * FROM user u,login l, role r WHERE u.user_id=l.user_id AND 
//     u.role_id=r.role_id AND l.username='$u' AND l.password='$p'";

        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password';";
        $result = $connection->query($sql); //To execute query
        return $result;
        //$nor=$result->num_rows; //To count no of rows
        //echo $nor;
    }

    function log($date, $time, $username, $sessionId) { //To Insert login Details
        $con = new mysqli("127.0.0.1", "root", "", "olhrs"); //Conncection string
        $sql = "INSERT INTO log (log_date,log_time,username,session_id) VALUES('$date','$time','$username','$sessionId')";
        $con->query($sql);
    }

}

?>
