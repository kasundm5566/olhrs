<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4" style="margin-top: 20px;">
        <img src="../images/icons/login.png" width="150px" height="150px"/>
        <h3>Login</h3>
        <form role="form" method="POST" action="operations/login-verify.php">
            <div class="form-group">
                <label class="control-label">User name</label>
                <input class="form-control" placeholder="Enter user name"
                       type="text" name="login-username">
            </div>
            <div class="form-group">
                <label class="control-label">Password</label>
                <input class="form-control" placeholder="Enter password" type="password" name="login-password">
            </div>
            <div style="text-align: right;">
                <a id="anchor-forgotpass">Forgot password</a>
                <input type="submit" class="btn btn-success" id="btn-loginsubmit" value="Login">
            </div>
            <div style="margin-bottom: 20px;"></div>
            <div style="text-indent: 3px;">
                <?php
                // To display invalid user name or password
                if (isset($_REQUEST['msg'])) {
                    $decoded_msg = base64_decode($_REQUEST['msg']);
                    echo '<p class="alert-danger contactus-error">'
                    . '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>';
                    echo " " . $decoded_msg . '</p>';
                }
                ?>
            </div>
        </form>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-5" style="margin-top: 20px;">
        <img src="../images/icons/signup-icon.png" width="150px" height="150px"/>
        <h3>Sign up</h3>
        <div style="margin-top: 20px;">
            <button id="btn-signup" class="btn btn-warning">Click here to sign up</button>
        </div>
    </div>                
</div>
<?php include './common/modals.php'; ?>