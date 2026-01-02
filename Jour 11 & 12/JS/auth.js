// ========== AUTHENTICATION ========== 

$(document).ready(function() {
    
    // Check if user already logged in
    const currentUser = getCurrentUser();
    if (currentUser) {
        if (currentUser.role === 'student') {
            window.location.href = 'dashboard.html';
        } else {
            window.location.href = 'backoffice.html';
        }
    }
    
    // LOGIN FORM
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        
        const email = $('#email').val();
        const password = $('#password').val();
        
        // Validation
        if (!email || !password) {
            showAlert('Veuillez remplir tous les champs', 'danger');
            return;
        }
        
        if (!isValidEmail(email)) {
            showAlert('Email invalide', 'danger');
            return;
        }
        
        // API Call
        API.login(email, password)
            .then(response => {
                setCurrentUser(response.user);
                showAlert(`Bienvenue ${response.user.fullName}!`, 'success');
                
                setTimeout(() => {
                    if (response.user.role === 'student') {
                        window.location.href = 'dashboard.html';
                    } else {
                        window.location.href = 'backoffice.html';
                    }
                }, 1500);
            })
            .catch(error => {
                showAlert(error.message, 'danger');
            });
    });
    
    // Password Toggle
    $('#togglePassword').on('click', function() {
        const input = $('#password');
        const icon = $(this).find('i');
        
        if (input.attr('type') === 'password') {
            input.attr('type', 'text');
            icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            input.attr('type', 'password');
            icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });
    
    // REGISTER FORM
    $('#registerForm').on('submit', function(e) {
        e.preventDefault();
        
        const fullName = $('#fullName').val();
        const email = $('#registerEmail').val();
        const password = $('#registerPassword').val();
        const confirmPassword = $('#confirmPassword').val();
        const terms = $('#terms').is(':checked');
        
        // Validations
        if (!fullName || !email || !password || !confirmPassword) {
            showAlert('Veuillez remplir tous les champs', 'danger');
            return;
        }
        
        if (!isLaPlateformeEmail(email)) {
            showAlert('Vous devez utiliser un email @laplateforme.com', 'danger');
            return;
        }
        
        if (!isValidPassword(password)) {
            showAlert('Le mot de passe doit contenir au minimum 8 caractères, 1 majuscule et 1 chiffre', 'danger');
            return;
        }
        
        if (password !== confirmPassword) {
            showAlert('Les mots de passe ne correspondent pas', 'danger');
            return;
        }
        
        if (!terms) {
            showAlert('Vous devez accepter les conditions', 'danger');
            return;
        }
        
        // API Call
        API.register(email, password, fullName)
            .then(response => {
                showAlert(`Compte créé avec succès! Redirection...`, 'success');
                setTimeout(() => {
                    window.location.href = 'index.html';
                }, 1500);
            })
            .catch(error => {
                showAlert(error.message, 'danger');
            });
    });
    
    // Password Strength Indicator
    $('#registerPassword').on('input', function() {
        const strength = getPasswordStrength($(this).val());
        const bar = $('#strengthBar');
        const text = $('#strengthText');
        
        bar.removeClass('weak medium strong');
        if (strength === 'Faible') {
            bar.addClass('weak');
            text.text('Mot de passe faible');
        } else if (strength === 'Moyen') {
            bar.addClass('medium');
            text.text('Mot de passe moyen');
        } else {
            bar.addClass('strong');
            text.text('Mot de passe fort');
        }
    });
    
    // Logout
    $(document).on('click', '#logoutBtn', function(e) {
        e.preventDefault();
        clearSession();
    });
});
