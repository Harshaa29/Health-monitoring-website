// Function to handle registration
function registerUser() {
    // Get input values
    var newUsername = document.getElementById('reg-username').value;
    var newPassword = document.getElementById('reg-password').value;
    
    // Retrieve existing users or initialize an empty array
    var users = JSON.parse(localStorage.getItem('users')) || [];
    
    // Check if the username already exists
    var existingUser = users.find(user => user.username === newUsername);
    if (existingUser) {
        alert('Username already exists. Please choose a different one.');
        return;
    }
    
    // Add new user to the array
    users.push({ username: newUsername, password: newPassword });
    
    // Save updated user array to localStorage
    localStorage.setItem('users', JSON.stringify(users));
    
    alert('Registration successful! Please login with your new credentials.');
    window.location.replace('login.html');
}
