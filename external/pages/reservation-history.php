<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['username'] == "") {
    header("Location:index.php");
    exit;
}

include './common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();
$GLOBALS['connection'] = $connection;
?>

<html>
    <head>
        <title>Reservation History</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../bootstrap-3.3.7/css/bootstrap.min_1.css"/>
        <link rel="stylesheet" href="../css/site-layout.css"/>
        <link rel="stylesheet" href="../css/styles.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <script src="../js/jquery-1.12.2.min.js"></script>
        <script src="../bootstrap-3.3.7/js/bootstrap.min.js"></script> 
        <script src="../js/loader.js"></script>
        <script src="../js/modernizr.min.js"></script>
        <script src="../js/jquery.easing.1.3.min.js"></script>  
        <script src="../js/effects.js"></script>
        <script src="../js/reservation-history.js"></script>
        <script src="../js/jquery-rate-picker.js"></script>
        <script src="../js/validations/make-payment.js"></script>
    </head>

    <body>
        <?php $username = $_SESSION['username']; ?>
        <div class="loader-anim"></div>
        <?php include './common/minimum-header.php'; ?>

        <div style="margin-top: 100px; padding-left: 15px;">
            <h3>Hall Reservations</h3>
        </div>
        <?php
        $sql = "SELECT * FROM reservation r,hall_reservation hr,hall h WHERE"
                . " r.reservation_id=hr.reservation_id AND h.hall_id=hr.hall_id"
                . " AND customer_id IN (SELECT customer_id FROM customer WHERE"
                . " username='$username');";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            ?>
            <div style="padding-left: 20px; padding-right: 20px;">
                <table class="table table-bordered table-condensed" style="width: 80%;">
                    <thead>
                        <tr>
                            <th style="display: none;">Type</th>
                            <th>Hall</th>
                            <th>Session</th>
                            <th>Reservation date</th>                       
                            <th>Pax</th>
                            <th>Total (Rs.)</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) { ?>

                            <tr>
                                <td class="res-type" style="display: none;">Hall</td>
                                <td><?php echo $row['hall_name']; ?></td>
                                <td><?php echo $row['time']; ?></td>
                                <td><?php echo $row['reservation_date']; ?></td>                            
                                <td><?php echo $row['pax']; ?></td>
                                <td class="res-total"><?php echo $row['total']; ?></td>
                                <td><?php echo $row['reservation_status']; ?></td>
                                <td style="text-align: center;">
                                    <button class="btn btn-primary btn-xs btn-payment-history" style="width: 35%;">Payment history</button>
                                    <button class="btn btn-primary btn-xs btn-add-feedback" style="width: 35%;">Add feedback</button>
                                </td>
                                <td class="res-id" style="visibility: hidden;"><?php echo $row['reservation_id']; ?></td>
                            </tr>                
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
        } else {
            echo "No hall reservations available.";
        }
        ?>

        <div style="margin-top: 15px; padding-left: 15px;">
            <h3>Room Reservations</h3>
        </div>

        <?php
        $sql2 = "SELECT * FROM reservation r,room_reservation rr,room_type rt, meal_plan mp"
                . " WHERE r.reservation_id=rr.reservation_id AND"
                . " rr.room_type_id=rt.room_type_id AND rr.meal_plan_id=mp.meal_plan_id AND customer_id IN"
                . " (SELECT customer_id FROM customer WHERE username='$username');";
        $result2 = $connection->query($sql2);

        if ($result2->num_rows > 0) {
            ?>
            <div style="padding-left: 20px;padding-right: 20px;">
                <table class="table table-bordered table-condensed" style="width: 80%;">
                    <thead>
                        <tr>
                            <th style="display: none;">Type</th>
                            <th>Room</th>                     
                            <th>Meal plan</th>                     
                            <th>Check in</th>
                            <th>Check out</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row2 = $result2->fetch_assoc()) { ?>

                            <tr>
                                <td class="res-type" style="display: none;">Room</td>
                                <td><?php echo $row2['room_type_name']; ?></td>
                                <td><?php echo $row2['meal_plan_name']; ?></td>
                                <td><?php echo $row2['check_in']; ?></td>                            
                                <td><?php echo $row2['check_out']; ?></td>
                                <td><?php echo $row2['reservation_status']; ?></td>
                                <td class="res-total"><?php echo $row2['total']; ?></td>
                                <td style="text-align: center;">
                                    <button class="btn btn-primary btn-xs btn-payment-history" style="width: 35%;">Payment history</button>
                                    <button class="btn btn-primary btn-xs btn-add-feedback" style="width: 35%;">Add feedback</button>
                                </td>
                                <td class="res-id" style="visibility: hidden;"><?php echo $row2['reservation_id']; ?></td>
                            </tr>                
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
        } else {
            echo "No hall reservations available.";
        }
        ?>

        <div id="modal-payment-history-popup" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><img src="../images/icons/payment-history.png" class="popup-icons">&nbsp;&nbsp;Payment History</h4>
                    </div>
                    <div class="modal-body payment-modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a type="button" class="btn btn-success" id="btn-modal-makePayment">Make payment</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal-add-feedback-popup" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><img src="../images/icons/feedback.png" class="popup-icons">&nbsp;&nbsp;Payment History</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <label>Rating:</label>
                            <span id="ratingStars" data-stars="5"></span>
                        </div>
                        <div class="form-group">
                            <label>Comment:</label>
                            <label class="lbl-errors" id="feedback-comment-error"></label>
                            <textarea class="form-control" rows="5" id="feedback-comment"></textarea>
                        </div>
                        <input type="hidden" id="cust-id-hdn" value="<?php echo $_SESSION['userinfo']['customer_id']; ?>"/>
                        <div class="alert alert-success" id="addfeedback-success">
                            <strong>Success!</strong>Feedback saved.
                        </div>
                        <div class="alert alert-danger" id="addfeedback-error">
                            <strong>Error!</strong> Something went wrong. Please try again later. Sorry for the inconvenience.
                        </div>
                    </div>                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="btn-add-feedback-ok">Add</button>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>