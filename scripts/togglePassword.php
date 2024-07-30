<script>
  const togglePassword = (input, show, hide, enable) => {
    const passwordInput = document.getElementById(input);
    const showButton = document.getElementById(show);
    const hideButton = document.getElementById(hide);
    if (enable) {
      passwordInput.type = 'text';
      showButton.classList.add('d-none');
      hideButton.classList.remove('d-none');
    } else {
      passwordInput.type = 'password';
      hideButton.classList.add('d-none');
      showButton.classList.remove('d-none');
    }
  }
</script>