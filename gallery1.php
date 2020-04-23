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
      <img src="uploads/festival/<?php echo $photography['id']; ?>.jpg" alt="<?php echo $photography['name']; ?> " />
      <figcaption><?php echo ucfirst($photography['name']); ?></figcaption>
    </figure>
  </a>
<?php
}
?>


  </main>

  <?php include("includes/footer.php"); ?>
</body>


<div id = galleryContainer>


 <?php

 $records = exec_sql_query($db, "SELECT * from gallery", array()) -> fetchAll(PDO::FETCH_ASSOC);
 foreach ($records as $record) {
   echo '<img class = "group_label_input" alt = "Gallery Pictures" src = "uploads/festival/' . $record["gallery_id"] . "." .$record["file_ext"] .'"/>';
 }
   ?>
 </div>

</html>
<img id="myImg" src="img_snow.jpg" alt="Snow" style="width:100%;max-width:300px"> <div id="myModal" class="modal"><span class="close">&times;</span> <img class="modal-content" id="img01">  <div id="caption"></div>
</div>


foreach ($records as $record) { ?>

<img id ="myImg" src="uploads/festival/"<?php .$record["gallery_id"]. "." .$record["file_ext"]. '">'; ?> alt=<?php .$record["description"]. '"/>'

< style="width:100%;max-width:300px">

<div id="myModal" class="modal">
<span class="close">&times;</span>


 <img class="modal-content" id="img01">


 <div id="caption"></div>"." .$record["file_ext"] .'"/>';
}
?>
</div>
