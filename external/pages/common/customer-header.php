<!-- Header of the logged in customer -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="customer-home.php">Aqua Pearl Lake Resort</a>
        </div>
        <div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                <ul class="nav navbar-nav">
                    <!--Sections of the index page-->
                    <li><a class="page-scroll" href="#welcome-section">Welcome</a></li>
                    <li><a class="page-scroll" href="#overview-section">Overview</a></li>
                    <li><a class="page-scroll" href="#gallery-section">Gallery</a></li>
                    <li><a class="page-scroll" href="#reservation-section">Reservations</a></li>
                    <li><a class="page-scroll" href="#contact-section">Contact us</a></li>
                    <li><a class="page-scroll" href="#login-section">( Welcome 
                            <?php
                            $username = $_SESSION['username'];
                            echo $username;
                            ?>
                            )
                            <button class="btn-link" id="link-profile-nav">Profile</button>
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
        // Logout action
        $("#link-logout-nav").click(function () {            
            window.location.href = '../index.php';
        });
        
        // Action to view profile
        $("#link-profile-nav").click(function () {
//            window.location.href = './profile.php';
            window.open('./profile.php', '_self');
        });
    });
</script>  