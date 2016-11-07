<!--Header with less links. Used in some pages.-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=<?php
            if ($_SESSION['username'] != "") {
                echo 'customer-home.php';
            }
            ?>>Aqua Pearl Lake Resort</a>
        </div>
        <div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a class="page-scroll" href="#login-section">( Welcome 
                            <?php
                            $username = $_SESSION['username'];
                            echo $username;
                            ?>
                            )
                            <button class="btn-link" id="link-logout-nav">Logout</button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<script>
    $(document).ready(function () {
        $("#link-logout-nav").click(function () {
            window.location.href = '../index.php';
        });
    });
</script>    