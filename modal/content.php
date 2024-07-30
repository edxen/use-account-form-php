<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div>
          <p id="errorModalText" class="fs-6 text-danger"></p>
        </div>
        <div id="errorModalButtons" class="d-flex justify-content-end">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Try again</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="successModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div>
          <p id="successModalText" class="fs-6">
            You have successfully created an account!
          </p>
        </div>
        <div id="successModalButtons" class="d-flex justify-content-end">
          <a href="login.php" class="btn btn-success">Go to Log-in</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  var successModal = new bootstrap.Modal(document.getElementById('successModal'));
  var successModalText = document.getElementById('successModalText');
  var successModalButtons = document.getElementById('successModalButtons');
  var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
  var errorModalText = document.getElementById('errorModalText');
  var errorModalButtons = document.getElementById('errorModalButtons');
</script>