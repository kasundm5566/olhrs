<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-5">
        <form role="form" method="POST" action="operations/contactus-email.php">
            <div class="form-group">
                <label class="control-label">Name</label>
                <label class="lbl-errors" id="lbl-contactus-name-error"></label>
                <input class="form-control" type="text" placeholder="Enter your name" id="txt-contactfrm-name" name="sender-name">
            </div>
            <div class="form-group">
                <label class="control-label">Email</label>
                <label class="lbl-errors" id="lbl-contactus-email-error"></label>
                <input class="form-control" type="email" id="txt-contactfrm-email"
                       placeholder="Enter your email" name="sender-email">
                <p class="help-block">eg: abc@example.com</p>
            </div>
            <div class="form-group">
                <label class="control-label">Contact no</label>
                <label class="lbl-errors" id="lbl-contactus-contactno-error"></label>
                <input class="form-control" type="text" placeholder="Enter your contact no" id="txt-contactfrm-contactno" name="sender-contactno">
                <p class="help-block">eg: 0771234567</p>
            </div>
            <div class="form-group">
                <label class="control-label">Message</label>
                <label class="lbl-errors" id="lbl-contactus-message-error"></label>
                <textarea class="form-control" id="txt-contactfrm-message" rows="6" placeholder="Enter your message" name="sender-message"></textarea>
            </div>
            <div class="row">
                <div class="g-recaptcha col-md-6" id="recaptcha" data-callback="recaptchaCallback" data-sitekey="6LfgcykTAAAAAJ-vPjIhaR_FIx-tmwoqbCR4txW0"></div>
                <div class="col-md-6" style="text-align: right; display: inline-block;">
                    <input type="submit" class="btn btn-success btn-contactfrm" id="btn-contact-submit">
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-5">
        <div class="contact-details-block">
            <img src="../images/icons/location-pin.png" class="icons"/>
            <strong>&nbsp;Address</strong><br>
            <p class="contactfrm-details">201, Galkanuwa Road, Gorakana, Moratuwa.</p>
        </div>
        <div class="contact-details-block">
            <img src="../images/icons/phone-call.png" class="icons"/>
            <strong>&nbsp;Telephone</strong><br>
            <p class="contactfrm-details">+94 382 232 960 / 094 4381283  / +94 114 376 363</p>
        </div>
        <div class="contact-details-block">
            <img src="../images/icons/smartphone.png" class="icons"/>
            <strong>&nbsp;Mobile</strong><br>
            <p class="contactfrm-details">+94 722 440 550</p>
        </div>
        <div class="contact-details-block">
            <img src="../images/icons/fax.png" class="icons"/>
            <strong>&nbsp;Fax</strong><br>
            <p class="contactfrm-details">+94 112 715 291</p>
        </div>
        <div class="contact-details-block">
            <img src="../images/icons/email.png" class="icons"/>
            <strong>&nbsp;Email</strong><br>
            <p class="contactfrm-details">aquapearl@sltnet.lk</p>
        </div>
        <div style="margin-bottom: 30px;"></div>
        <div style="text-indent: 3px;">
            <?php
            // To display invalid user name or password
            if (isset($_REQUEST['status'])) {
                $decoded_status = base64_decode($_REQUEST['status']);
                if ($decoded_status == "error") {
                    echo '<p class="alert-danger contactus-error">'
                    . '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>';
                    $msg = $_REQUEST['msg'];
                    $decoded_msg = base64_decode($msg);
                    echo " " . $decoded_msg . '</p>';
                } else if ($decoded_status == "success") {
                    echo '<p class="alert-success contactus-error">'
                    . '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
                    $msg = $_REQUEST['msg'];
                    $decoded_msg = base64_decode($msg);
                    echo " " . $decoded_msg . '</p>';
                }
            }
            ?>
        </div>
    </div>
</div>