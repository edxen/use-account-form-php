<div class="input-group col-12 mb-3">
  <div class="form-floating">
    <input type="password" class="form-control" name="<?php echo htmlspecialchars($passwordId); ?>" id="<?php echo htmlspecialchars($passwordId); ?>" value="<?php echo htmlspecialchars($passwordValue); ?>" placeholder="<?php echo htmlspecialchars($passwordPlaceholder); ?>" required minLength="6" maxLength="20">
    <label for="<?php echo htmlspecialchars($passwordId); ?>" class="form-label"><?php echo htmlspecialchars($passwordLabel); ?></label>
  </div>
  <div class="btn-group">
    <button class="btn btn-outline-secondary rounded-start-0 rounded-end" type="button" id="show<?php echo htmlspecialchars($passwordId); ?>" onClick="togglePassword('<?php echo htmlspecialchars($passwordId); ?>', 'show<?php echo htmlspecialchars($passwordId); ?>', 'hide<?php echo htmlspecialchars($passwordId); ?>', true)">
      <?php include('image/icon-eye.php'); ?>
    </button>
    <button class="btn btn-outline-secondary bg-secondary text-white d-none" type="button" id="hide<?php echo htmlspecialchars($passwordId); ?>" onClick="togglePassword('<?php echo htmlspecialchars($passwordId); ?>', 'show<?php echo htmlspecialchars($passwordId); ?>', 'hide<?php echo htmlspecialchars($passwordId); ?>', false)">
      <?php include('image/icon-eye-hide.php'); ?>
    </button>
  </div>
</div>