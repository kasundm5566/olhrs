<?php
$username=$_SESSION['username'];
$group=$_SESSION['group'];
echo '<img class="nav-icon" src="../../images/icons/user.png"/>'.' Welcome '.$username.' (<lable id="lbl-user-group">'.$group.'</lable>)';
?>

<!--<a href="../../common/logout.php">Logout</a>-->
<button class="btn-link" id="link-logout-nav">Logout</button>