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
</head>
<?php
include("includes/header.php");
$title = "Header";
$header_nav_class = "current_page";
?>

<main>
<div class="test2">

<form id="search_form" action="gallery.php" method="get">
      <label id= "tag_field" for="search_text">Search a Tag:</label>
      <input id="search_text" type="text" name="image" value="<?php if ( isset($image) ) { echo htmlspecialchars($image); } ?>" placeholder="i.e. apples"/>
      <button id="search_submit" name="search_button" type="submit">Search</button>
</form>


<?php

if (isset($_GET['image'])) {
  $show_image_results = FALSE;

  $image = filter_input(INPUT_GET, 'image', FILTER_SANITIZE_STRING);
  $image = strtolower(trim($image));

  if ($image != '') {
    $show_image_results = TRUE;

    $sql = "SELECT * FROM tags INNER JOIN image_tags ON tags.id = image_tags.tags_id INNER JOIN images ON image_tags.images_id = images.id WHERE tags.tag_name LIKE '%' || :search || '%'";
    $params = array (
      ':search' => $image
    );
    $result = exec_sql_query($db, $sql, $params);
    if ($result) {
      $found_images = $result->fetchALL();
    }
  }
} else {
  $show_image_results = FALSE;
}
?>

<?php if ($show_image_results == FALSE ) {

$result = exec_sql_query(
  $db, "SELECT * FROM images",
  array());

if (count($result) > 0) {
  ?><div id="galleryContainer">
  <?php
  foreach($result as $image) {
    echo "<div class='source'>";
    echo "<a href=\"image_details.php?" . http_build_query(array( 'id' => $image['id'])) . "\"><img class=\"gallery_image\" alt=\"image\" src=\"uploads/festival/"  . $image["id"] . "." . $image["image_ext"] . "\"/></a>";
    echo "<p class='white'> " .  $image['description'] . "</p>";
    echo "</div>";

  }
  ?></div>
  <?php
} else {
  echo '<p>Currently no posts are available.</p>';
}
} elseif ( isset($found_images)) {?>

<p class="white">Here are the matches for: <strong><?php echo htmlspecialchars( $image ); ?></strong></p>
<div id="galleryContainer">
<?php
foreach($found_images as $image) {

  echo "<a href=\"image_details.php?" . http_build_query(array( 'id' => $image['id'])) . "\"><img class=\"gallery_image\" src=\"uploads/festival/" . $image["id"] . "." . $image["image_ext"] . "\"/></a>";
}
?></div><?php
} else {
?>
<p class="white">No results match your search of <strong><?php echo htmlspecialchars( $image );?></strong>. Please use another tag!</p>

<?php } ?>
<div id="tagss">
<p>All Tags: </p>
<?php

$sql_tags2 = "SELECT * FROM tags";
$params_tags2 = array ();
$result_tags = exec_sql_query($db, $sql_tags2, $params_tags2);

if ($result_tags) {
$all_tags = $result_tags->fetchAll();
}

foreach ($all_tags as $tag) {
echo "<span class='white_center'>   " . $tag['tag_name'] . "</span>";
}

?>
</div>

</div>
</div>
</main>




  <?php include("includes/footer.php"); ?>
</body>

</html>
