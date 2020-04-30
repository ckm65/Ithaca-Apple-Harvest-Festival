<?php
include("includes/init.php");
$header_nav_class7 = "current_page";
$title = "Plop Box";

$messages = array();
const MAX_FILE_SIZE = 1000000;

if (isset($_POST["submit_upload"])) {


  $upload_info = $_FILES["box_file"];

  $upload_description = trim($_POST["description"]);
  $upload_description = filter_var($upload_description, FILTER_SANITIZE_STRING);

  if($upload_info['error'] == UPLOAD_ERR_OK && $upload_description != ''){
    $basename = basename($upload_info['name']);
    $upload_ext = strtolower( pathinfo($basename, PATHINFO_EXTENSION) );

    $sql = "INSERT INTO images (image_name,image_ext, description,source) VALUES ( :image_name, :image_ext, :description, :source)";
    $params = array(
      ':image_name' => $basename,
      ':image_ext' => $upload_ext,
      ':description' => $upload_description,
      ':source' => $upload_source
    );

    $result = exec_sql_query($db, $sql, $params);
    if ($result){
      $new_identification = $db->lastInsertId("id");
      $new_path = "./uploads/festival/" . $new_identification . "." . $upload_ext;
      move_uploaded_file( $upload_info["tmp_name"], $new_path );
      array_push($messages, "You have sucessfully uploaded a file!");
    } else {
      array_push($messages, "Failed to Upload File. Please Fill our parameters");
    };
  }
  else {
      array_push($messages,"Failed to Upload File. Please fill out all parameters and Try Again");
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

<main>
<h2> Ithaca Apple Harvest Festival Plop Box</h2>

<p> Welcome to the Ithaca Apple Harvest Festival Plop Box, a file storing service! </p>

<h2> Upoad a File to the Ithaca Apple Harvest Festival Gallery Page </h2>

<?php foreach ($messages as $message) {
        echo "<p><strong>" . htmlspecialchars($message) . "</strong></p>\n";
      } ?>
<div id = upload>
<form id="uploadFile" action="plopbox.php" enctype= "multipart/form-data" method = "POST"  >

      <input type="hidden" name="MAX_FILE_SIZE" value= "<?php echo MAX_FILE_SIZE; ?>" />

      <div class="group_label_input">
        <label for="box_file">Upload File:</label>
        <input id="box_file" type="file" name="box_file">
      </div>

      <div class="group_label_input">
        <label for="box_desc">Description:</label>
        <textarea id="box_desc" name="description" cols="40" rows="5"></textarea>
      </div>

      <div class="group_label_input">
        <span></span>
        <button name="submit_upload" type="submit">Upload File</button>
      </div>
    </form>
</div>
<h2> View Saved Files </h2>

<ul style = "list-style-type:none">
      <?php
      $records = exec_sql_query($db, "SELECT * FROM images")->fetchAll(PDO::FETCH_ASSOC);
      foreach ($records as $record) {
        echo "<li><a href=\"uploads/festival/" . $record["id"] . "." . $record["image_ext"] . "\">" . htmlspecialchars($record["image_name"]) . "</a> - " . htmlspecialchars($record["description"]) . "</li>";
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
