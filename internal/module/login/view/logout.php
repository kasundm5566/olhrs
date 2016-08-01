<?php
if(!isset($_SESSION)){
    session_start();
 }
unset($_SESSION['userinfo']); //Remove session
unset($_SESSION['session_id']);
header('refresh:3,url=../../login/view/index.php'); //Redirection


?>
<html>
    <head> 
        <title>OnLine Sale Management System</title>
        <link rel="icon" href="../../../images/bi.png" />
        <link rel="stylesheet" type="text/css" 
              href="../../../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" 
          href="../../../css/mainlayout.css" />
     
    <script type="text/javascript" src="../../../js/jquery-1.8.3.min.js">
     
    </script>
   
    </script>
    </head>
    <body>
        <div id="main">
            <div id="header">
               <?php include '../../../common/header.php'; ?>      
              
            </div>
            <div id="navi">
                <?php // include '../../../common/navi.php'; ?>
                
                &nbsp;</div>
            <div id="contents">
                <div>
                   
                    <h3 align="center">Logout</h3>
                    
     <p align="center">You have successfully logout from the System</p>
     <p align="center"><img src="../../../images/del.jpg" />
     </p>
     <p align="center"><a href="../../login/view/index.php">Login</a></p>
     
     
                    
                </div>
                
                
                
            </div>      
            <div id="footer">
                
               <?php include '../../../common/footer.php'; ?> 
            </div>            
        </div>
        
    </body>
    
</html>
