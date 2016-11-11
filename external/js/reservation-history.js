$(document).ready(function () {
    var ratingStars = 5; // Star rating initial value
    // Initialize star rating plugin
    $.ratePicker("#ratingStars", {
        max: 10,
        rate: function (stars) {
            ratingStars = stars;
        }
    });

    $('.btn-payment-history').off('click');
    $(".btn-payment-history").click(function () {
        var res_id = $(this).closest("tr").find("td.res-id").text();
        var total = $(this).closest("tr").find("td.res-total").text();
        var type = $(this).closest("tr").find("td.res-type").text();

        // Load payment history details in tabular format to the modal body
        $('.payment-modal-body').load('./dao/payment/get-payment-history.php?res=' + res_id + '&total=' + total + "&type=" + type, function (result) {
            $("#btn-modal-makePayment").hide();

            $('#modal-payment-history-popup').modal({show: true});
            if ($("#due-amount-hdn").val() > 0) {
                $("#btn-modal-makePayment").show();
                $("#make-payment-div").hide();

                $('#btn-modal-makePayment').off('click');
                $("#btn-modal-makePayment").click(function () {
                    $("#make-payment-div").show();
                });
            } else {
                $("#make-payment-div").hide();
                $("#btn-modal-makePayment").hide();
            }
        });
    });

    // Add a feedback
    $(".btn-add-feedback").click(function () {
        $("#addfeedback-success").hide();
        $("#addfeedback-error").hide();
        var res_id = $(this).closest("tr").find("td.res-id").text(); // Get reservation id
        // Get previous feedback if exists
        $('#feedback-comment').load('./dao/feedback/get-feedback.php?res=' + res_id, function (result) {
            $('#feedback-comment').val(result);
            $('#modal-add-feedback-popup').modal({show: true});
            if ($('#feedback-comment').val() != "") {
                // If previous feedback found, button text will change to update.
                $("#btn-add-feedback-ok").text("Update feedback");
            } else {
                // If previous feedback not found, button text will change to add.
                $("#btn-add-feedback-ok").text("Add feedback");
            }
        });

        $('#btn-add-feedback-ok').off('click'); // Remove previous event bindings
        $("#btn-add-feedback-ok").click(function () {
            var isCommentValid = validateComment(); // Check comment validation status
            if ($("#btn-add-feedback-ok").text() == "Add feedback") { // If adding a feedback
                if (isCommentValid != false) {
                    // Send Ajax request to add the feedback
                    $.ajax({
                        type: "POST",
                        url: "./operations/add-feedback.php",
                        data: {
                            "stars": ratingStars,
                            "comment": $("#feedback-comment").val(),
                            "custId": $("#cust-id-hdn").val(),
                            "resId": res_id
                        },
                        success: function (result) {
                            if ($.trim(result) == '1') {
                                $('#feedback-comment').val("");
                                $("#addfeedback-success").show();
                                $("#addfeedback-error").hide();
                            } else {
                                $("#addfeedback-success").hide();
                                $("#addfeedback-error").show();
                            }
                        }
                    });
                }
            } else { // If updating a feedback
                if (isCommentValid != false) {
                    $.ajax({
                        type: "POST",
                        url: "./operations/update-feedback.php",
                        data: {
                            "stars": ratingStars,
                            "comment": $("#feedback-comment").val(),
                            "resId": res_id
                        },
                        success: function (result) {
                            if ($.trim(result) == '1') {
                                $('#feedback-comment').val("");
                                $("#addfeedback-success").show();
                                $("#addfeedback-error").hide();
                            } else {
                                $("#addfeedback-success").hide();
                                $("#addfeedback-error").show();
                            }
                        }
                    });
                }
            }
        });
    });

    $(".btn-room-add-feedback").click(function () {
        $("#modal-add-feedback-popup").modal('show');
    });

});

// Validate the comment
function validateComment() {
    var background_color = "#fde99c";
    if ($("#feedback-comment").val().length == 0) {
        $("#feedback-comment-error").show();
        $("#feedback-comment").css("background-color", background_color);
        $("#feedback-comment-error").text("Comment should not be empty.");
        return false;
    } else {
        var inputVal = $("#feedback-comment").val();
        var numericReg = /^\s+$/; // Check whether the feedback contains only whitespaces
        if (numericReg.test(inputVal)) {
            $("#feedback-comment-error").show();
            $("#feedback-comment").css("background-color", background_color);
            $("#feedback-comment-error").text("Invalid comment.");
            return false;
        } else {
            $("#feedback-comment").css("background-color", "white");
            $("#feedback-comment-error").hide();
            return true;
        }
    }
}