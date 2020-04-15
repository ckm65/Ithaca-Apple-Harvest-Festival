<?php
include("includes/init.php");
$header_nav_class5 = "current_page";
$title = "Location";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> The Ithaca Apple Harvest Festival </title>
    <link rel="stylesheet" type="text/css" href="styles/theme.css" media="screen" />
</head>
<body>

<?php
include("includes/header.php");
$title = "Header";
$header_nav_class = "current_page";

?>


    <h2 class="box box2"> Location</h2>
    <div class="location">
        <figure>
        <!-- Source: https://static01.nyt.com/images/2015/09/02/business/02ithaca1/02ithaca1-articleLarge.jpg?quality=90&auto=webp -->
        <img src = "images/commons.jpg" alt= "Commons" />
        Source: <cite><a href="https://hlblighting.com/wordpress/wp-content/uploads/2017/11/Ithaca-Commons_01web.jpg">Commons</a></cite>
        <figcaption>Commons</figcaption>
    </figure>
    </div>
    <div class="locate">
    <p> The Ithaca Apple Harvest Festival is located in dowtown Ithaca in the Ithaca Commons! It is occuring Friday September 27 - Sunday September 29th. </p>
    <p> 171 E M.L.K Jr. St </p>
    <p> Ithaca, NY 14850</p>
    </div>
    <hr>
    <h2 class = "box box1">Hours </h2>
    <h4> FRIDAY </h4>
    <p> 12:00pm - 6:00pm </p>
    <h4> SATURDAY & SUNDAY </h4>
    <p> 10:00am - 6:00pm </p>

    <h2 class="box box2"> Parking </h2>
    <p> <strong> Free Parking </strong> </p>
    <p> <em>On Weekdays:</em></p>
    <ul>
        <li> 8:00pm - 3:00am in the garages </li>
        <li> 6:00pm - 3:00 am on the street
    </ul>
    <p> <em> On Weekends </em>
        <p> Parking is free on Saturdays and Sundays except when special event parking rates inside the garages apply.</p>
    <p> <em> Garage Locations </em> </p>
    <ul>
        <li> Seneca Street Garage </li>
        <li> Green Street Garage </li>
        <li> Cayuga Street Garage </li>
        <li> Valet Parking Downtown </li>
    </ul>

</div>
<?php
include("includes/footer.php");
$title = "Footer";
$footer_nav_class = "current_page";

?>
</body>
</html>
