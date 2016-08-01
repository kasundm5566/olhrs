<?php
//To create db connection 
class dbconnection{    
    function connection(){
      $connection=new mysqli("localhost","root","","olhrs"); //Conncection string
      return $connection;
     }
 
}
