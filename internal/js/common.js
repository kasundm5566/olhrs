$(document).ready(function () {
    $("#link-logout-nav").click(function () {
        $("#modal-logoutConfirm").modal('show');
        $("#logoutOk").click(function () {
            window.location.href = '../../common/logout.php';
        });
    });
});