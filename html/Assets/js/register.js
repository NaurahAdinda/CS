const passwordInput = document.getElementById('pw');
const confirmPasswordInput = document.getElementById('pw2');

function validatePassword() { //cek apakah password sama
  if (passwordInput.value !== confirmPasswordInput.value) {
    confirmPasswordInput.setCustomValidity('Passwords do not match.');
  } else {
    confirmPasswordInput.setCustomValidity('');
  }
}

passwordInput.addEventListener('change', validatePassword);
confirmPasswordInput.addEventListener('keyup', validatePassword);
