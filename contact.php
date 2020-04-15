<?php
include("includes/init.php");
$header_nav_class1 = "current_page";
$title = "Header";

// Default to form
$show_form = TRUE;

// Default to no feedback
$show_name_feedback = FALSE;
$show_email_feedback = FALSE;
$show_age_feedback = FALSE;
$show_email_feedback = FALSE;
$show_day_feedback = FALSE;
$show_local_feedback = FALSE;
$show_enjoy_feedback = FALSE;
$show_improvements_feedback = FALSE;

// Form default values
$form_first_name = '';
$form_last_name = '';
$form_email = '';
$form_age = null;
$day =null;
$local = null;
$enjoy = null;
$enjoy2 = "";
$improvements = "";





// Was the form submitted? Was there a POST request?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // TODO: Assume the order is valid (uncomment line below).
  $is_form_valid = TRUE;


  // Name is required.
  $form_first_name = trim($_POST['form_first_name']);
  $form_first_name = filter_input(INPUT_POST,"form_first_name",FILTER_SANITIZE_STRING);

if ($form_first_name =='') {
  $is_form_valid = FALSE;
  $show_name_feedback = TRUE;

}

$form_last_name = trim($_POST['form_last_name']);
$form_last_name = filter_input(INPUT_POST,"form_last_name",FILTER_SANITIZE_STRING);
if ($form_last_name =='') {
  $is_form_valid = FALSE;
  $show_name_feedback = TRUE;

}
// Check that email was filled out.
$form_email = trim($_POST['form_email']);
$form_email = filter_input(INPUT_POST, "form_email", FILTER_VALIDATE_EMAIL);
  if (empty($form_email)){
    $is_form_valid  = FALSE;
    $show_email_feedback = TRUE;
  }

  // Check that Age is filled out

  $form_age = trim($_POST['form_age']);
  $form_age = filter_input(INPUT_POST, 'form_age', FILTER_VALIDATE_INT);

$day = filter_input(INPUT_POST, "day", FILTER_SANITIZE_STRING);
if (in_array($client_coverage,array('Friday September 27 2019', 'Saturday September 28 2019', 'Sunday September 29 2019 ')))
  $day;
 else {
    $day= null;
  }
  if ($form_age <1){
      $is_form_valid = FALSE;
      $show_age_feedback = TRUE;
  }
  // Check that day is filled out
  $day = trim($_POST['day']);
  if ($day == null) {
    $is_form_valid = FALSE;
    $show_day_feedback = TRUE;
  }


// Are you a local resident?
$local = trim($_POST['local']);

$local = filter_input(INPUT_POST, "local", FILTER_SANITIZE_STRING);
if (in_array($local,array('Yes', 'No')))
$local;
else {
  $local= null;
}

if ($local == null){
    $is_form_valid = FALSE;
    $show_local_feedback = TRUE;
}
// Did you enjoy the festival?
$enjoy = trim($_POST['enjoy']);
$enjoy = filter_input(INPUT_POST, "enjoy", FILTER_SANITIZE_STRING);
if (in_array($enjoy,array('Yes', 'No')))
$enjoy;
else {
  $enjoy= null;
}

if ($enjoy == null){
    $is_form_valid = FALSE;
    $show_enjoy_feedback = TRUE;
}
// Textbox feedback
$enjoy2 = trim($_POST['enjoy2']);
$enjoy2 = filter_input(INPUT_POST,"enjoy2",FILTER_SANITIZE_STRING);
if ($enjoy2 == "") {
    $is_form_valid = FALSE;
    $show_enjoy2_feedback = TRUE;
}

// Textbox feedback 2
$improvements = trim($_POST['improvements']);

$improvements = filter_input(INPUT_POST,"improvements",FILTER_SANITIZE_STRING);
if ($improvements == "") {
    $is_form_valid = FALSE;
    $show_improvements_feedback = TRUE;
}

else {

}
// If the order is valid (TRUE), then do not show form (FALSE).
$show_form = !$is_form_valid;
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
<h2>Contact Us</h2>
    <p> <strong>The Downtown Ithaca Alliance Mailing Address</strong></p>
    <p>171 E. State St. PMB #136</p>
    <p> Center Ithaca</p>
    <p>Ithaca, NY 14850</p>
    <br>
    <p><strong>Phone:</strong>(607) 277 - 8679</p>
    <p><strong>Fax:</strong>(607) 277 - 8691</p>
    <p><strong>info@downtownithaca.com</strong></p>

    <h2>Feedback Form</h2>
    <p> We would love to get some feedback on the Festival!</p>

<?php
    if ($show_form) { ?>
    <form id="ticketForm" method="post"
    action="contact.php" novalidate>
    <?php
        if ($show_name_feedback == TRUE) { ?>
        <p class="form_feedback">Please provide a first name for your form.</p> <?php } ?>

<div class="formId">

<label for="user"> First Name: </label>
<input id="user"  type ="text" name="form_first_name"
value= "<?php echo htmlspecialchars($form_first_name);?> " />
</div>

<?php
        if ($show_name_feedback == TRUE) { ?>
        <p class="form_feedback">Please provide a last name for your form.</p> <?php } ?>

<div class="formId">

<label for="user"> Last Name: </label>
<input id="user"  type ="text" name="form_last_name"
value= "<?php echo htmlspecialchars($form_last_name);?> " />
</div>

<?php
        if ($show_email_feedback== TRUE) { ?>
        <p class="form_feedback">Please provide a email for your form.</p> <?php } ?>
    <div class="formId">

    <label> Email: </label>
         <input type ="email" name="form_email"
         value= "<?php echo htmlspecialchars($form_email);?> " />
     </div>

    <?php
    if ($show_age_feedback== TRUE) { ?>
        <p class="form_feedback">Please provide an age.</p> <?php } ?>

    <div class="formId">
          <label for="user">Age:</label>
          <input type="number" id="user" name="form_age" min="0" value="<?php echo $form_age; ?>" />
        </div>

        <?php
    if ($show_day_feedback== TRUE) { ?>
        <p class="form_feedback">You must select a day.</p> <?php } ?>
        <?php

if (isset($_POST['day']))
{
    $day= $_POST['day'];
} ?>
        <div class = "formId">
        <label for = "day"> What day did you attend the Festival: </label>
        <select name = "day">
        <option <?php if($day=="Friday September 27 2019")      echo 'selected="selected"'; ?> value="Friday September 27 2019 ">Friday September 27 2019</option>
        <option <?php if($day=="Saturday September 28 2019")      echo 'selected="selected"'; ?> value="Saturday September 28 2019">Saturday September 28 2019</option>
        <option <?php if($day=="Sunday September 29 2019")      echo 'selected="selected"'; ?> value="Sunday September 29 2019">Sunday September 29 2019</option>



        </select>
    </div>


    <?php
    if ($show_local_feedback== TRUE) { ?>
        <p class="form_feedback">You must select an option.</p> <?php } ?>

    <div class ="formId3">
    <label>Are you a Local Ithaca Resident?</label>
    <input type="radio" name="local" value="Yes"
    <?php if (isset($_POST['local']) && $_POST['local'] == "Yes") echo 'checked="checked"';?>>Yes
    <input type="radio" name="local" value="No"
    <?php if (isset($_POST['local']) && $_POST['local'] == "No") echo 'checked="checked"';?>>No
        </div>

        <?php
    if ($show_enjoy_feedback== TRUE) { ?>
        <p class="form_feedback">You must select an option.</p> <?php } ?>

    <div class ="formId3">
    <label>Did you Enjoy the Festival?</label>
    <input type="radio" name="enjoy" value="Yes"
    <?php if (isset($_POST['enjoy']) && $_POST['enjoy'] == "Yes") echo 'checked="checked"';?>>Yes
    <input type="radio" name="enjoy" value="No"
    <?php if (isset($_POST['enjoy']) && $_POST['enjoy'] == "No") echo 'checked="checked"';?>>No
        </div>


        <?php if ($show_enjoy2_feedback == TRUE) { ?>
        <p class="form_feedback">Please describe what you enjoyed!</p> <?php } ?>
        <div class="formId4">
            <label for = "comment"> What did you enjoy about the Ithaca Apple Harvest Festival? </label>
           <textarea name="enjoy2" cols="60" rows="5"><?php
if(isset($_POST['enjoy2']))
{
   echo htmlspecialchars($_POST['enjoy2'], ENT_QUOTES);
}
?></textarea>


<?php if ($show_improvements_feedback == TRUE) { ?>
        <p class="form_feedback">Please provide any improvements or concerns</p> <?php } ?>
        <div class="formId4">
            <label for = "comment"> Please provide any improvements/suggestions or concerns! </label>
           <textarea name="improvements" cols="60" rows="5"><?php
if(isset($_POST['improvements']))
{
   echo htmlspecialchars($_POST['improvements'], ENT_QUOTES);
}
?></textarea>

<div>
        <input type='submit' name='Submit' value = 'Submit' style='width:100px' />
    </div>


    </form>

        <?php } else { ?>

      <ul>
        <li><strong>First Name:</strong> <?php echo htmlspecialchars($form_first_name);?>
        <li><strong>Last Name: </strong><?php echo htmlspecialchars($form_last_name);?>
        <li><strong>Email:</strong> <?php echo htmlspecialchars($form_email);?></li>
        <li><strong>Age: </strong><?php echo htmlspecialchars($form_age);?></li>
        <li><strong>Day Attended:</strong> <?php echo htmlspecialchars($day);?></li>


        <li><strong>Are you a Local Resident:</strong> <?php echo htmlspecialchars($local);?></li>
        <li><strong>Did you enjoy the Festival: </strong><?php echo htmlspecialchars($enjoy);?></li>
        <li><strong>What you enjoyed aobut the Festival: </strong><?php echo htmlspecialchars($enjoy2);?></li>
        <li><strong>Improvements/Concerns/Suggestions:</strong> <?php echo htmlspecialchars($improvements);?></li>
        </ul>


      <p><a href="contact.php">New Form</a></p>
    <?php } ?>
        </body>
        </html>
