document.addEventListener("DOMContentLoaded", () => {
    // Login and signup forms
    const loginButton = document.getElementById('loginButton');
    const signupButton = document.getElementById('signupButton');
    const adminButton = document.getElementById('adminButton');
    
    loginButton.onclick = () => {
        document.getElementById('loginModal').style.display = 'flex';
    };
    signupButton.onclick = () => {
        document.getElementById('signupModal').style.display = 'flex';
    };
    

    // Close modals
    document.getElementById('loginClose').onclick = () => {
        document.getElementById('loginModal').style.display = 'none';
    };
    document.getElementById('signupClose').onclick = () => {
        document.getElementById('signupModal').style.display = 'none';
    };
   

    // Form handling
    document.getElementById('loginForm').onsubmit = (e) => {
        e.preventDefault();
        alert("Login successful!");
        window.location.href = "main.html"; // Redirect to the main page after login
    };

    document.getElementById('signupForm').onsubmit = (e) => {
        e.preventDefault();
        alert("Account created successfully!");
        window.location.href = "main.html"; // Redirect to the main page after signup
    };

    document.getElementById('adminForm').onsubmit = (e) => {
        e.preventDefault();
        const email = document.getElementById('adminEmail').value;
        const password = document.getElementById('adminPassword').value;

        if (email === "admin@footprints.com" && password === "admin123") {
            alert("Admin logged in successfully!");
            window.location.href = "admin.html"; // Redirect to admin page after login
        } else {
            alert("Invalid admin credentials.");
        }
    };

    // Logout button functionality on main page
    const logoutButton = document.getElementById('logoutButton');
    if (logoutButton) {
        logoutButton.onclick = () => {
            alert("Logged out successfully!");
            window.location.href = "index.html"; // Redirect to landing page after logout
        };
    }
});

document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', (event) => {
        alert('Product added to cart');
        // Implement cart logic here
    });
});

const profileIcon = document.getElementById('profileIcon');
const profileDropdown = document.getElementById('profileDropdown');
profileIcon.addEventListener('click', () => {
    profileDropdown.classList.toggle('show');
});
