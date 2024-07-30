<?php
include("scripts/connectdb.php");

session_start();
if (isset($_SESSION['username'])) {
  header("Location: viewrecords.php");
}

$username = "";
$password = "";
$confirmPassword = "";
$firstname = "";
$lastname = "";
$errorUsernameExists = false;
$errorRegistration = "";
$successRegistration = false;

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];

  $usernameQuery = "SELECT * FROM usertbl WHERE username='$username'";
  $usernameQueryResult = mysqli_query($conn, $usernameQuery);
  if (mysqli_num_rows($usernameQueryResult) > 0) {
    $errorUsernameExists = true;
  } else {
    $registerQuery = "INSERT INTO usertbl (username, password, firstname, lastname) VALUES ('$username', '$password', '$firstname', '$lastname')";
    $registerQueryResult = mysqli_query($conn, $registerQuery);
    if ($registerQueryResult) {
      $successRegistration = true;
    } else {
      $errorRegistration = "there was an error in regisration, error: " . mysqli_error(($conn));
    }
  }
}
?>
<html>
<?php include('scripts/header.php'); ?>

<body class="bg-light">
  <?php include('component/layout-start.php'); ?>

  <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Register an account</h2>
  <form action="register.php" method="POST" onsubmit="return validateForm()">
    <div class="row gy-2 overflow-hidden">
      <?php
      include('component/registration-form.php');

      $buttonText = "Sign up";
      include('component/button-submit.php');
      ?>
      <div class="col-12">
        <p class="m-0 text-secondary text-center">Already have an account? <a href="login.php" class="link-primary text-decoration-none">Log-in</a></p>
      </div>
    </div>
  </form>

  <?php
  include('component/layout-end.php');
  include("bootstrap/bootstrap-script.php");
  include('modal/content.php');
  include("scripts/togglePassword.php");
  ?>
  <script>
    const errorUsernameExists = <?php echo json_encode($errorUsernameExists); ?>;
    const successRegistration = <?php echo json_encode($successRegistration); ?>;

    if (errorUsernameExists) {
      errorModal.show();
      errorModalText.innerHTML = "Username already exists.";
    }

    if (successRegistration) {
      successModal.show();
    }

    const validateForm = () => {
      console.log('validating')
      const passwordInput = document.getElementById("password");
      const confirmPasswordInput = document.getElementById("confirmPassword");

      if (passwordInput.value !== confirmPasswordInput.value) {
        errorModal.show();
        errorModalText.innerHTML = "Password and confirm password does not match."
        return false;
      }
      return true;
    }
  </script>
</body>

</html>