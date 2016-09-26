<h4>Why Aqua Pearl</h4>

<span id="demo" style="color: #1DC116; font-size: large;">
    A quiet and a tranquil getaway|Well trained staff
    |The best place in town|Front bordering the Bolgoda Lake|Contact us for more information
</span>

<div id="myCarousel1" class="carousel slide" data-ride="carousel1">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel1" data-slide-to="1"></li>
        <li data-target="#myCarousel1" data-slide-to="2"></li>
        <li data-target="#myCarousel1" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="../images/sidebar-images/01.jpg">
        </div>

        <div class="item">
            <img src="../images/sidebar-images/02.jpg">
        </div>

        <div class="item">
            <img src="../images/sidebar-images/03.jpg">
        </div>

        <div class="item">
            <img src="../images/sidebar-images/04.jpg">
        </div>
        
        <div class="item">
            <img src="../images/sidebar-images/05.jpg">
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel1" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel1" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<script>
    $('#demo').cycleText({
        // text separator
        separator: '|',
        // animation type
        // refer to https://daneden.github.io/animate.css/
        animation: 'flipInX',
        // animation speed in ms
        interval: 5000

    });
</script>
