<?php
include("includes/init.php");
$header_nav_class3 = "current_page";
$title = "Gallery";
?>

<!-- FULL GALLERY-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> The Ithaca Apple Harvest Festival </title>
    <link rel="stylesheet" type="text/css" href="styles/theme.css" media="screen" />
    <script src="scripts/jquery-3.4.1.min.js" type = "text/javascript"></script>
    <script src="scripts/validation.js" type = "text/javascript"></script>
</head>
<body>

<?php
include("includes/header.php");
$title = "Header";
$header_nav_class = "current_page";
?>

<div id = galleryContainer  >
<?php

$records = exec_sql_query($db, "SELECT * from gallery", array()) -> fetchAll(PDO::FETCH_ASSOC);
foreach ($records as $record) {
  echo '<a class = "link_container" href = "image_details.php?'. http_build_query(array('gallery_id' => $record['gallery_id'])) . '"> <img class = "group_label_input" alt = "Gallery Pictures" src = "uploads/festival/' . $record["gallery_id"] . "." .$record["file_ext"] .'"/></a>' . PHP_EOL;


}




  ?>


 </div>

  <?php include("includes/footer.php"); ?>
</body>

</html>
