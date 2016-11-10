<html>
    <head>
        <title>Forgot Password Status</title>
    </head>
    <body>
        <?php
        // To display invalid user name or password
        if (isset($_REQUEST['msg'])) {
            $decoded_msg = base64_decode($_REQUEST['msg']);
            echo $decoded_msg;
        }
        ?>
    </body>
</html>
