<?php
include("includes/init.php");
$header_nav_class3 = "current_page";
$title = "Gallery";

// Get a list of animals from the database
$photography = exec_sql_query($db, "SELECT * FROM photo;")->fetchAll();

// Initialize default values
$retry_search = FALSE;
$show_results = FALSE;

// Get search value
$sticky_search = $_GET['search'];

// Was an request for an animal sent?
if (empty($sticky_search)) {
  // No value sent, or value was empty. Don't show the results.
} else {
  $search = trim($sticky_search);
  $search = strtolower($search);

  $sql = "SELECT * FROM photo WHERE (name LIKE '%' || :search || '%')";
  $params = array(
    ':search' => $search
  );
  $photography= exec_sql_query($db, $sql, $params)->fetchAll();
}

function photography_element($photography)
{ ?>
  <a href="gallery.php?<?php echo http_build_query(array('search' => strtolower($photography['name']))); ?>">
    <figure>
      <img src="uploads/festival/<?php echo $photography['id']; ?>.jpg" alt="<?php echo $photography['name']; ?>" />
      <figcaption><?php echo ucfirst($photography['name']); ?></figcaption>
    </figure>
  </a>
<?php
}
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

    <form id="photoForm" action="gallery.php" method="get">
      <label for="photo_field">Search:</label>
      <input type="text" id="photo_field" name="search" value="<?php echo htmlspecialchars(!empty($sticky_search) ? $sticky_search : ''); ?>" />

      <button type="submit">Check</button>
    </form>

    <div class="photo_gallery">
      <?php
      if (count($photography) > 0) {
        foreach ($photography as $p) {
          photography_element($p);
        }
      } else { ?>
        <p>No photographs matched your search.</p>
      <?php } ?>
    </div>

    <?php if ($sticky_search) { ?>
      <form action="gallery.php" method="get">
        <button type="submit">Clear Search</button>
      </form>
    <?php } ?>

  </main>

  <?php include("includes/footer.php"); ?>
</body>

</html>
