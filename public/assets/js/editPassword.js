// Toggle visibility function
function togglePasswordVisibility(checkbox, eyeIcon, passwordField) {
    checkbox.addEventListener('change', function () {
        if (this.checked) {
            // Show password
            passwordField.type = 'text';
            // Change the eye icon to indicate password visibility
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        } else {
            // Hide password
            passwordField.type = 'password';
            // Change the eye icon to indicate password invisibility
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        }
    });
}

// Get old password elements
const oldPasswordCheckbox = document.getElementById('toggle_old_password');
const oldPasswordEyeIcon = document.getElementById('eyeIcon1');
const oldPasswordField = document.getElementById('old_password');

// Get new password elements
const newPasswordCheckbox = document.getElementById('toggle_new_password');
const newPasswordEyeIcon = document.getElementById('eyeIcon2');
const newPasswordField = document.getElementById('new_password');

// Get confirmation password elements
const confirmationCheckbox = document.getElementById('toggle_confirmation');
const confirmationEyeIcon = document.getElementById('eyeIcon3');
const confirmationField = document.getElementById('confirmation');

// Toggle visibility for old password
togglePasswordVisibility(oldPasswordCheckbox, oldPasswordEyeIcon, oldPasswordField);

// Toggle visibility for new password
togglePasswordVisibility(newPasswordCheckbox, newPasswordEyeIcon, newPasswordField);

// Toggle visibility for confirmation password
togglePasswordVisibility(confirmationCheckbox, confirmationEyeIcon, confirmationField);
