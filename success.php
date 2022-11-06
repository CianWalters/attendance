<?php 
    $title = 'Success';

require_once 'includes/header.php'; 
require_once 'db/conn.php';

if(isset($_GET['submit'])){
    //extract values from the $_POST array
    $fname = $_GET['firstname'];
    $lname = $_GET['lastname'];
    $dob = $_GET['dob'];
    $email = $_GET['email'];
    $contact = $_GET['phone'];
    $specialty = $_GET['expertise'];

    //Call Function to insert and track if success or not
    $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty);

    if($isSuccess){
        //echo '<h1 class="text-center text-success">You Have Been Registered!</h1>';
        include 'includes/successmessage.php';
    }
    else{
      //  echo '<h1 class="text-center text-danger">There was an error in processing!</h1>';
      include 'includes/errormessage.php';
    }
    }
?>

<!-- in line 10. 18rem changed to 25rem to accommodate the email address width -->
<!-- <div class="card" style="width: 25rem;">
  <div class="card-body">
    <h5 class="card-title">
            <?php //echo $_GET['firstname'] . ' ' . $_GET['lastname']; ?>
    </h5>
    <h6 class="card-subtitle mb-2 text-muted">
    <?php //echo $_GET['expertise']; ?>
    </h6>
    <p class="card-text">
        Date of Birth: <?php //echo $_GET['dob']; ?>
    </p>
    <p class="card-text">
        Email Address: <?php //echo $_GET['email']; ?>
    </p>
    <p class="card-text">
        Contact Number: <?php //echo $_GET['phone']; ?>
    </p>
    
  </div>
</div>

    <?php
        //echo $_GET['firstname'];
       // echo $_GET['lastname'];
        //echo $_GET['dob'];
        //echo $_GET['expertise'];
        //echo $_GET['email'];
        //echo $_GET['phone'];

    ?>
<br>
<br> -->

<!-- in line 45, 18rem changed to 25rem to accommodate the email address width -->
<div class="card" style="width: 25rem;">
  <div class="card-body">
    <h5 class="card-title">

<!-- Definately does not work with echo $_POST". Tried everything-->
<?php echo $_GET['firstname'] . ' ' . $_GET['lastname']; ?>
    </h5>
    <h6 class="card-subtitle mb-2 text-muted">
    <?php echo $_GET['expertise']; ?>
    </h6>
    <p class="card-text">
        Date of Birth: <?php echo $_GET['dob']; ?>
    </p>
    <p class="card-text">
        Email Address: <?php echo $_GET['email']; ?>
    </p>
    <p class="card-text">
        Contact Number: <?php echo $_GET['phone']; ?>
    </p>
    
  </div>
</div>
<br>
<br>
<br>

<?php require_once 'includes/footer.php'; ?>