<?php
include("includes/init.php");
$header_nav_class3 = "current_page";
$title = "Gallery";
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
 if (isset($_GET['gallery_id'])) {
     $click_input = $_GET['gallery_id'];
 }

 // find the corresponding image that was clicked
 $sql = "SELECT gallery_id, file_ext FROM gallery WHERE id = :id_val";
 $params = array(
     ':id_val' => $click_input
 );

 $show_images = exec_sql_query($db, $sql, $params) -> fetchAll();
  ?>
 <div id = "detail_container">

 <?php echo '<img class = "group_label_input" src = "uploads/festival/ ' . $show_images[0][0] . "." . $show_imges[0][1] . '"/>';
 ?>

<?php

$clicks = exec_sql_query($db, "SELECT DISTINCT * from gallery WHERE gallery_id = $click_input", array()) -> fetchAll(PDO::FETCH_ASSOC);

foreach ($clicks as $click) {
    echo '<img class = "group_label_input" alt = "Gallery Pictures" src = "uploads/festival/' . $record["gallery_id"] . "." .$record["file_ext"] .'"/>' ;
}
  ?>
<?php
include("includes/header.php");
$title = "Header";
$header_nav_class = "current_page";
?>

<?php include("includes/footer.php"); ?>
</body>

</html>
