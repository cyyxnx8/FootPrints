

  // Select the profile icon and dropdown
const profileIcon = document.getElementById('profileIcon');
const profileDropdown = document.getElementById('profileDropdown');

// Toggle dropdown visibility on profile icon click
profileIcon.addEventListener('click', function(event) {
    event.stopPropagation(); // Prevent event from bubbling up
    profileDropdown.classList.toggle('show'); // Toggle dropdown visibility
});

// Close dropdown if clicking outside of it
window.addEventListener('click', function() {
    if (profileDropdown.classList.contains('show')) {
        profileDropdown.classList.remove('show');
    }
});




 // Client-side password validation
const form = document.getElementById('createAccountButton');
const password = document.getElementById('password');
const confirmPassword = document.getElementById('confirm-password');

form.addEventListener('submit', function (e) {
    if (password.value !== confirmPassword.value) {
        e.preventDefault(); // Prevent form submission
        alert('Passwords do not match!'); // Show alert message
    }
});