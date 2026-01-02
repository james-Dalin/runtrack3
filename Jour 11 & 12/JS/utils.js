// ========== UTILITAIRES ========== 

// Validation Email
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Validation domaine @laplateforme.com
function isLaPlateformeEmail(email) {
    return email.endsWith('@laplateforme.com');
}

// Validation Password
function isValidPassword(password) {
    return password.length >= 8 && 
           /[A-Z]/.test(password) && 
           /[0-9]/.test(password);
}

// Password Strength
function getPasswordStrength(password) {
    let strength = 0;
    if (password.length >= 8) strength++;
    if (/[A-Z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[!@#$%^&*]/.test(password)) strength++;
    
    if (strength <= 1) return 'Faible';
    if (strength <= 2) return 'Moyen';
    return 'Fort';
}

// Show Alert
function showAlert(message, type = 'danger') {
    const alertHTML = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            <i class="fas fa-${type === 'danger' ? 'exclamation-circle' : 'check-circle'}"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    `;
    
    const container = document.getElementById('alertContainer');
    if (container) {
        container.innerHTML = alertHTML;
    }
}

// Format Date
function formatDate(date) {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(date).toLocaleDateString('fr-FR', options);
}

// Get Current User
function getCurrentUser() {
    const user = localStorage.getItem('currentUser');
    return user ? JSON.parse(user) : null;
}

// Set Current User
function setCurrentUser(user) {
    localStorage.setItem('currentUser', JSON.stringify(user));
}

// Clear Session
function clearSession() {
    localStorage.removeItem('currentUser');
    window.location.href = 'index.html';
}

// Date Comparison (Past/Future)
function isPastDate(date) {
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    const checkDate = new Date(date);
    checkDate.setHours(0, 0, 0, 0);
    return checkDate < today;
}
