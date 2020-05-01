<?php
include("includes/init.php");
$header_nav_class3 = "current_page";
$title = "Gallery";
$messages = array();
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
<h2> Welcome to the Ithaca Apple Harvest Festival Gallery! </h2>
<div class="search">

<form id="search_form" action="gallery.php" method="get">
      <label id= "search_field " for="search_tag">Search a Tag:</label>
      <input id="search_tag" type="text" name="image" value="<?php if ( isset($image) ) { echo htmlspecialchars($image); } ?>" placeholder="ex. #apples"/>
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
      $all_images = $result->fetchALL();
    }
  }
} else {
  $show_image_results = FALSE;
}
?>

<?php if ($show_image_results == FALSE ) {

$result = exec_sql_query(
  $db, "SELECT * FROM images",
  array())->fetchALL();;


if (count($result) > 0) {
  ?><div id="galleryContainer">
  <?php
  foreach($result as $image) {

    echo "<div class='source'>";
    echo "<a href=\"details.php?" . http_build_query(array( 'id' => $image['id'])) . "\"><img class=\"gallery_image\" alt=\"image\" src=\"uploads/festival/"  . $image["id"] . "." . $image["image_ext"] . "\"/></a>";
    echo "<p class='name_image'>" .  $image['description'] . "</p>";
    echo "</div>";

  }
  ?></div>
  <?php
} else {
  echo '<p>Currently no posts are available.</p>';
}
} elseif ( isset($all_images)) {?>

<p class="image_remove">View the images tagged: <strong><?php echo htmlspecialchars( $image ); ?></strong></p>

<div id="galleryContainer">

<?php
foreach($all_images as $image) {

  echo "<a href=\"details.php?" . http_build_query(array( 'id' => $image['id'])) . "\"><img class=\"gallery_image\" src=\"uploads/festival/" . $image["id"] . "." . $image["image_ext"] . "\"/></a>";
}
?></div><?php
} else {
?>
    <p class="image_remove"> No images matched your search of: <strong><?php echo htmlspecialchars( $image );?></strong>. Please search another tag!</p>

<?php } ?>

<!-- All Tags At footer -->


<div id="tagss">
<p>All Tags: </p>
<?php

$sql_tag = "SELECT * FROM tags";
$params_tag = array ();
$all_tags = exec_sql_query($db, $sql_tag, $params_tag);

if ($all_tags) {
$found_all_tags = $all_tags->fetchAll();
}

foreach ($found_all_tags as $tag) {
echo "<span class='tag_decoration'>" . $tag['tag_name'] . "</span>";
}

?>
</div>
</div>
</div>
</main>
<?php include("includes/footer.php");?>
</body>



</html>
