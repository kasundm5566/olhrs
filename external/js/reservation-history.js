$(document).ready(function () {
    var ratingStars = 5;
    $.ratePicker("#ratingStars", {
        max: 10,
        rate: function (stars) {
            ratingStars = stars;
        }
    });

    $(".btn-payment-history").click(function () {
        var res_id = $(this).closest("tr").find("td.res-id").text();
        var total = $(this).closest("tr").find("td.res-total").text();

        $('.payment-modal-body').load('./dao/payment/get-payment-history.php?res=' + res_id + '&total=' + total, function (result) {
            $("#btn-modal-makePayment").hide();

            $('#modal-payment-history-popup').modal({show: true});
            if ($("#due-amount-hdn").val() > 0) {
                $("#btn-modal-makePayment").show();
                $("#make-payment-div").hide();
                $("#btn-modal-makePayment").click(function () {
                    $("#make-payment-div").show();
                });
            } else {
                $("#make-payment-div").hide();
                $("#btn-modal-makePayment").hide();
            }
        });
    });

    $(".btn-add-feedback").click(function () {
        $("#addfeedback-success").hide();
        $("#addfeedback-error").hide();
        var res_id = $(this).closest("tr").find("td.res-id").text();
        $('#feedback-comment').load('./dao/feedback/get-feedback.php?res=' + res_id, function (result) {
            $('#feedback-comment').val(result);
            $('#modal-add-feedback-popup').modal({show: true});
            if ($('#feedback-comment').val() != "") {
                $("#btn-add-feedback-ok").text("Update feedback");
            } else {
                $("#btn-add-feedback-ok").text("Add feedback");
            }
        });

        $('#btn-add-feedback-ok').off('click');
        $("#btn-add-feedback-ok").click(function () {
            var isCommentValid = validateComment();
            if ($("#btn-add-feedback-ok").text() == "Add feedback") {
                if (isCommentValid != false) {
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
            } else {
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

function validateComment() {
    var background_color = "#fde99c";
    if ($("#feedback-comment").val().length == 0) {
        $("#feedback-comment-error").show();
        $("#feedback-comment").css("background-color", background_color);
        $("#feedback-comment-error").text("Comment should not be empty.");
        return false;
    } else {
        var inputVal = $("#feedback-comment").val();
        var numericReg = /^\s+$/;
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