<?php
include("scripts/connectdb.php");

session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}

if (isset($_POST['delete_username'])) {
  $usernameToDelete = $_POST['delete_username'];
  $deleteQuery = "DELETE FROM usertbl WHERE username='$usernameToDelete'";
}

$dataQuery = "SELECT * FROM usertbl";
$dataQueryResult = mysqli_query($conn, $dataQuery);

?>
<html>
<?php include('scripts/header.php'); ?>

<body class="bg-light">
  <?php include('component/layout-start.php'); ?>
  <div class="d-flex justify-content-end">
    <button class="btn btn-danger" type="submit" onClick="confirmLogout()">Logout</button>
  </div>
  <h2 class="fs-6 fw-normal text-center text-secondary mb-4">View Records</h2>
  <?php
  if (isset($_POST['delete_username'])) {
    if (mysqli_query($conn, $deleteQuery)) {
  ?>
      <div id="alertMessage" class="alert alert-success text-center" role="alert">Record deleted successfully.</div>
    <?php
      $dataQueryResult = mysqli_query($conn, $dataQuery);
    } else {
    ?>
      <div id="alertMessage" class="alert alert-danger text-center" role="alert">Error deleting record. Please try again.</div>
  <?php
    }
  }
  ?>
  <?php if (mysqli_num_rows($dataQueryResult) > 0) {
  ?>
    <table class="table">
      <thead>
        <tr class="text-center align-middle">
          <th scope="col">Username</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($Row = mysqli_fetch_assoc($dataQueryResult)) {
        ?>
          <tr class="text-center align-middle">
            <td><?php echo htmlspecialchars($Row["username"]); ?></td>
            <td><?php echo htmlspecialchars($Row["firstname"]); ?></td>
            <td><?php echo htmlspecialchars($Row["lastname"]); ?></td>
            <td>
              <button class="btn btn-danger" onClick="confirmDelete('<?php echo urlencode($Row['username']); ?>')">
                Delete
              </button>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  <?php
  } else {
  ?>
    <p class="fs-6">No Records Found</p>
  <?php

  }
  ?>
  <?php
  include('component/layout-end.php');
  include("bootstrap/bootstrap-script.php");
  include('modal/content.php');
  ?>
  <script>
    const confirmLogout = () => {
      successModal.show()
      successModalText.innerHTML = `Confirm Logout`
      successModalButtons.innerHTML = `
        <form action="scripts/logout.php" method="POST" style="display:inline;" class="mb-0">
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
            <button type="submit" class="btn btn-danger">Logout</button>
          </div>
        </form>
      `
    }

    const confirmDelete = (username) => {
      errorModal.show()
      errorModalText.innerHTML = `Do you want to delete record for username ${username}`
      errorModalButtons.innerHTML = `
        <form action="viewrecords.php" method="POST" style="display:inline;" class="mb-0">
          <input type="hidden" name="delete_username" value="${username}">
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <button type="submit" class="btn btn-danger">Delete</button>
          </div>
        </form>
      `
    }

    window.onload = () => {
      const alertMessage = document.getElementById('alertMessage');
      if (alertMessage) {
        setTimeout(() => {
          alertMessage.classList.add('fade');
          setTimeout(() => {
            alertMessage.style.display = 'none';
          }, 100);
        }, 3000);
      }
    }
  </script>

</body>

</html>