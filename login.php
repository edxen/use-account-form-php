<?php
include("scripts/connectdb.php");

session_start();
if (isset($_SESSION['username'])) {
  header("Location: viewrecords.php");
}

$username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
$password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
$isLoggingIn = false;
$isLoginSuccess = false;

if (isset($_POST['submit'])) {
  $isLoggingIn = true;
  $username = $_POST['username'];
  $password = $_POST['password'];

  $loginQuery = "SELECT * FROM usertbl WHERE username='$username' AND password='$password'";
  $loginQueryResult = mysqli_query($conn, $loginQuery);
  if (mysqli_num_rows($loginQueryResult) == 0) {
    $isLoginSuccess = false;
  } else {
    $_SESSION["username"] = $username;
    $isLoginSuccess = true;
  }
}
?>
<html>
<?php include('scripts/header.php'); ?>

<body class="bg-light">
  <?php include('component/layout-start.php'); ?>

  <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Sign in to your account</h2>
  <form action="login.php" method="POST">
    <div class="row gy-2 overflow-hidden">
      <?php
      include('component/login-form.php');
      $buttonText = 'Log-in';
      include('component/button-submit.php');
      ?> <div class="col-12">
        <p class="m-0 text-secondary text-center">Don't have an account? <a href="register.php" class="link-primary text-decoration-none">Sign up</a></p>
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
    const isLoggingIn = <?php echo json_encode($isLoggingIn); ?>;
    const isLoginSuccess = <?php echo json_encode($isLoginSuccess); ?>;

    if (isLoggingIn) {
      if (!isLoginSuccess) {
        errorModal.show();
        errorModalText.innerHTML = "Invalid username/password"
      } else {
        successModal.show();
        successModalText.innerHTML = "You are now logged in!";
        successModalButtons.innerHTML = `<a href="./" class="btn btn-success">Go to View Records</a>`;
      }
    }
  </script>
</body>

</html>