<?php
include("includes/init.php");
$header_nav_class3 = "current_page";
$title = "Gallery";
$messages = array();
$messages1= array();
$messages2 = array();
// Utilized Lab with the SQL joins for help also utilized office hours and consulting hours
?>

<!-- See when something is clicked -->
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
?>

<!-- Delete an image -->
<?php if (isset ($_POST
['delete_image'])) {
$sql_new = "SELECT * FROM images WHERE images.id=:image_delete";
$params_new = array (':image_delete' => $id);
$result_new = exec_sql_query($db, $sql_new, $params_new)->fetchAll();
$image_id_del = $result_new[0]['id'];
$image_ext_del = $result_new[0]['image_ext'];
unlink("uploads/festival/$image_id_del.$image_ext_del");
$sql_delete = "DELETE FROM images WHERE images.id=:image_delete";

$delete_params = array (':image_delete' => $id);
$result = exec_sql_query($db, $sql_delete, $delete_params);

if ($result) {
    $image_id = $id;
    $sql_image_del = "DELETE FROM image_tags WHERE image_tags.images_id=:image_del";
    $params_del = array (':image_del'=> $image_id);
    $result2 = exec_sql_query($db, $sql_image_del, $params_del);
}
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

<!-- Delete tag from image -->
<?php if (isset ($_POST['delete_tag_button'])) {

$tag_to_delete = filter_input(INPUT_POST, 'current_tag_name', FILTER_SANITIZE_STRING);
$image_to_delete = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

$tag_to_delete = strtolower($_POST['tag_delete']);
$image_to_delete = strtolower($_POST['id']);
$sql = "DELETE FROM image_tags
WHERE tags_id = :tag_del AND images_id = :current_image" ;
$sql_2 = "SELECT id FROM tags WHERE tag_name IS :current_tag_name";
$param_2 = array(':current_tag_name'=> $tag_to_delete );
$result_2 = exec_sql_query($db, $sql_2, $param_2)->fetchAll();
$params = array (':tag_del' => $result_2[0]['id'], ':current_image' => $image_to_delete);
$result = exec_sql_query($db, $sql, $params);
array_push($messages, "Tag Sucessfully Deleted, view above to confirm!");
}?>

<!-- Add tag to image -->
<?php
if (isset ($_POST['add_tag_button'])) {
$sql = "SELECT * FROM tags WHERE tag_name = :input";
$sql2 = "SELECT * FROM image_tags
INNER JOIN images ON image_tags.images_id = images.id
INNER JOIN tags ON image_tags.tags_id=tags.id
WHERE tags.id=:input";
$params = array (
    ':input'=> strtolower($_POST['tag_add']));
$result_1 = exec_sql_query($db, $sql, $params)->fetchAll();
$result_2 = exec_sql_query($db, $sql2, $params)->fetchAll();
array_push($messages1, "Tag Sucessfully Added! (if you added a tag that is already listed it has already been implmented.Please choose another tag)");
if (count($result_1)==0) {
    $tag_to_add = strtolower($_POST['tag_add']);
    $sql = "INSERT INTO tags(tag_name) VALUES (:tag_add)";
    $params = array (':tag_add' => $tag_to_add );
    $result = exec_sql_query($db, $sql, $params);
    if ($result) {
        $new_tag_id = $db->lastInsertId("id");
        $circular = $_POST['id'];
        $sql_tags = "INSERT INTO image_tags(tags_id, images_id) VALUES (:id_add, :image_add)";
        $params_tags = array (
            ':id_add'=>$new_tag_id,
            ':image_add'=>$circular);
        $result2 = exec_sql_query($db, $sql_tags, $params_tags);

    }
}
else{
    $sql2 = "SELECT * FROM image_tags
    INNER JOIN images ON image_tags.images_id = images.id
    INNER JOIN tags ON image_tags.tags_id=tags.id
    WHERE tags.id=:id_add AND images.id = :image_add";
    $circular = $_POST['id'];
            $params_add = array(
                ':id_add'=>$result_1[0]['id'],
                ':image_add'=>$circular);
    $result_2 = exec_sql_query($db, $sql2, $params_add)->fetchAll();
    if (count($result_2)==0){
        $sql = "INSERT INTO image_tags(tags_id, images_id) VALUES (:id_add, :image_add)";
        $params_add = array(
            ':id_add'=>$result_1[0]['id'],
            ':image_add'=>$circular);
        $result_3 = exec_sql_query($db, $sql, $params_add);

    }
}
}
?>

<!-- Join tags for -->
<?php
$sql = "SELECT * FROM image_tags
INNER JOIN images ON image_tags.images_id = images.id
INNER JOIN tags ON image_tags.tags_id=tags.id
WHERE images.id=:image";
$params = array ( ':image' => $image['id']);
$result = exec_sql_query($db, $sql, $params);
?>
<!-- Delete Feedback -->
<?php
if (isset ($_POST['delete_image'])) { ?>
<p id="image_remove">The image has been removed from the gallery!</p>
<?php
} else {
?>

 <!-- Entire Gallery page to specific details when clicked -->
 <?php if (isset($image)) { ?>
<figure>
    <div class="center_info">
    <img id="enlarge_image" src="uploads/festival/<?php echo $image['id']; ?>.<?php echo $image['image_ext']?>" alt="<?php echo htmlspecialchars($image['image_name']); ?>" />
</div>
</figure>
<div>
<blockquote>
    <p id="description"><?php echo htmlspecialchars($image['description']); ?></p>
</blockquote>
<blockquote>
    <p id="source_info">Source: <?php echo htmlspecialchars($image['source']); ?></p>
</blockquote>
</div>
<p class="info">Tags: </p>
<div class="tag_align">
<?php $records = $result->fetchAll();
foreach($records as $record) {
    echo "<span class='tag_decoration2'>" . $record['tag_name'] .'  ' . "</span>";
}  ?>
<?php }; ?>
</div>

<!--Add Tag  Submit Button FORM-->
<div class="center_info">
<form class="tags_edt" action="details.php?id=<?php echo $_GET['id']?> " method="post">
<div id="adding">
<input type="hidden" value="<?php echo $_GET['id']?>" name="id"/>
<div class=message>
  <?php foreach ($messages1 as $message) {
    echo "<p> <strong>" . htmlspecialchars($message) . "</strong></p>\n";
  } ?>
  </div>
  <div class=message>
  <?php foreach ($messages2 as $message) {
    echo "<p> <strong>" . htmlspecialchars($message) . "</strong></p>\n";
  } ?>
  </div>
<label id="add_tag" for="add_tag_input">Add a Tag:</label>
  <input id="add_tag_input" type="text" name="tag_add" placeholder="ex festival"/>
  <button class="search_submit" name="add_tag_button" type="submit">Add</button>
</div>
</form>
</div>

<!-- Remove Tag Submit Button FORM -->
<div class="center_info">
<br>
<form class="tags_edt" action="details.php?id=<?php echo $_GET['id']?> " method="post">
<input type="hidden" value="<?php echo $_GET['id']?>" name="id"/>
<div class=message>
  <?php foreach ($messages as $message) {
    echo "<p> <strong>" . htmlspecialchars($message) . "</strong></p>\n";
  } ?>
  </div>
  <label id="delete_tag" for="delete_tag_input">Delete a Tag:</label>
  <input id="delete_tag_input" type="text" name="tag_delete" placeholder="ex apples"/>
  <button class="search_submit" name="delete_tag_button" type="submit">Delete</button>
  <br>
  <button id="delete_image" name="delete_image" type="submit">Delete Image</button>
</form>
</div>
<?php }
?>
<?php include("includes/footer.php"); ?>
</body>
</html>
