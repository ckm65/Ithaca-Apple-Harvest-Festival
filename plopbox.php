<?php
include("includes/init.php");
$header_nav_class7 = "current_page";
$title = "Plop Box";

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

<main>
<h2> Ithaca Apple Harvest Festival Plop Box</h2>

<p> Welcome to the Ithaca Apple Harvest Festival Plop Box, a file storing service! </p>

<h2> Upoad a File to the Ithaca Apple Harvest Festival Plop Box </h2>

<h2> Saved Files </h2>

<ul style = "list-style-type:none">
      <?php
      $result = exec_sql_query($db, "SELECT * FROM gallery")->fetchAll(PDO::FETCH_ASSOC);
      foreach ($result as $record) {
        echo "<li><a href=\"uploads/gallery/" . $record["id"] . "." . $record["file_ext"] . "\">" . htmlspecialchars($record["file_name"]) . "</a> - " . htmlspecialchars($record["description"]) . "</li>";
      }
      ?>
    </ul>
</main>


<?php
include("includes/footer.php");
$title = "Footer";
$footer_nav_class = "current_page";

?>
</body>
</html>
