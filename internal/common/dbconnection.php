<?php
//To create db connection 
class dbconnection{    
    function connection(){
      $connection=new mysqli("127.0.0.1","root","","olhrs"); //Conncection string
      return $connection;
     }
 
}
