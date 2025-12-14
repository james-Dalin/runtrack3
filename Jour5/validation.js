// ========== VALIDATION EMAIL ==========
function isValidEmail(email) {
  const regex =  /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
}

// ========== VALIDATION FORCE DU MOT DE PASSE ==========
function hasPasswordStrength(password) {
  const hasUpperCase = /[A-Z]/.test(password);
  const hasLowerCase = /[a-z]/.test(password);
  const hasNumbers = /\d/.test(password);

  return hasUpperCase && hasLowerCase && hasNumbers;
}

