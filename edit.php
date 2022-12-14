

<?php 
    $title = 'Edit Record';

require_once 'includes/header.php'; 
require_once 'includes/auth_check.php';
require_once 'db/conn.php';

$results = $crud->getSpecialties();

if(!isset($_GET['id']))
{

   // echo 'error';
   include 'includes/errormessage.php';
   //the below redirects to the viewrecords page if you have entered incorrect values in the URL.
   header("Location: viewrecords.php");
}
else{
    $id = $_GET['id'];
    $attendee = $crud->getAttendeeDetails($id);


?>

<!-- 
    First Name
    Last Name
    Date of Birth (Using date picker)
    Specialty (Database Admin, Software Developer, Web Administrator, Other)
    Email Address
    Contact Number
 -->

    <h1 class="text-center">Edit Record</h1>

    <form method="post" action="editpost.php">
    <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>" />
  <div class="mb-3">
    <label for="firstname" class="form-label">First Name</label>
    <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>"id="firstname" name="firstname">
  </div>  

  <div class="mb-3">
    <label for="lastname" class="form-label">Last Name</label>
    <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>"id="lastname" name="lastname">
  </div>  

  <div class="mb-3">
    <label for="dob" class="form-label">Date of Birth</label>
    <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth'] ?>"id="dob" name="dob">
  </div>

<!-- The below taken from bootstrap 4.6 -->
  <div class="form-group">
    <label for="specialty">Area of Expertise</label>
    <select class="form-control" id="specialty" name="specialty">
      <!-- The below are hard coded options that were removed. Hard coding the database admin value as id 1 is not the best way. -->
      <!-- <option value="1">Database Admin</option>
      <option>Software Developer</option>
      <option>Web Administrator</option>
      <option>Other</option> -->
      <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
          <option value="<?php echo $r['specialty_id']?>" <?php if($r['specialty_id'] == 
          $attendee['specialty_id']) echo 'selected' ?>>
            <?php echo $r['name']; ?>
        </option>
        <?php }?>

    </select>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" value="<?php echo $attendee['emailaddress'] ?>"id="email" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <div class="mb-3">
    <label for="phone" class="form-label">Contact Number</label>
    <input type="text" class="form-control" value="<?php echo $attendee['contactnumber'] ?>"id="phone" name="phone"aria-describedby="phoneHelp">
    <div id="phoneHelp" class="form-text">We'll never share your phone number with anyone else.</div>
  </div>
<!-- In Bootstrap 5.2 - w-100 is used to stretch button across the page. -->
  <a href="viewrecords.php" class="btn btn-default">Back to List</a>

  <br>
  <br>
  <button type="submit" name="submit" class="btn btn-success w-100">Save Changes</button>

</form>

<!-- The below opened at line 15 -->
<?php } ?>

<br>
<br>
<br>
<br>
<br>

<?php require_once 'includes/footer.php'; ?>
