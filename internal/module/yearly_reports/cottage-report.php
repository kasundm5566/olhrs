<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['username'] == "" || $_SESSION['group'] == "") {
    header("Location:../login/index.php");
    exit;
}
?>

<?php
$year = $_REQUEST['year'];
?>

<table class="table-bordered" style="width: 100%;">
    <?php for ($i = 0; $i < 5; $i++) { ?>
        <tr>
            <td><?php echo $year ?></td>
            <td>asas</td>
        </tr>
    <?php }
    ?>
</table>