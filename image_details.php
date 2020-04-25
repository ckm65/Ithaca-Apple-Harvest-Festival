<?php
include("includes/init.php");
$header_nav_class3 = "current_page";
$title = "Gallery";
?>
<?php
include("includes/header.php");
$title = "Header";
$header_nav_class = "current_page";

?>
 <?php
if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    $sql= "SELECT * FROM images WHERE id = :id;";
    $params = array (
        ':id' => $id
    );
    $result = exec_sql_query($db, $sql, $params);

    if ($result) {
        $images = $result->fetchALL();
        $image = $images[0];
    }
}

if (isset($_GET['image'])) {
    $name = filter_input(INPUT_GET, 'image', FILTER_SANITIZE_STRING);
    $name = strtolower($name);

    $sql = "SELECT * FROM images WHERE LOWER(name)= :name;";
    $params = array ( ':name' => $name);
    $result = exec_sql_query($db, $sql, $params);
    if ($result) {
        $images = $result->fetchALL();
        $image = $images[0];
    }
}
?>

<?php if (isset($image)) { ?>

<figure>
    <div class="enlarge">
    <img id="enlarge" src="uploads/festival/<?php echo $image['id']; ?>.<?php echo $image['image_ext']?>" alt="<?php echo htmlspecialchars($image['image_name']); ?>" />
</div>
</figure>
<div>
<blockquote>
    <p id="desc_page"><?php echo htmlspecialchars($image['description']); ?></p>
</blockquote>
<blockquote>
    <p id="desc_source">Source: <?php echo htmlspecialchars($image['source']); ?></p>
</blockquote>
</div>
<p class="parts">Tags: </p>
<div class="center_new">
<?php $records = $result->fetchAll();
foreach($records as $record) {
    echo "<span class='white_center'>" . $record['tag_name'] .'  ' . "</span>";
}  ?>

<?php }; ?>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> The Ithaca Apple Harvest Festival </title>
    <link rel="stylesheet" type="text/css" href="styles/theme.css" media="screen" />

</head>
<body>




<?php include("includes/footer.php"); ?>
</body>

</html>
