// Function to handle login
function loginUser() {
    // Get input values
    var username = document.getElementById('login-username').value;
    var password = document.getElementById('login-password').value;
    
    // Retrieve users from localStorage
    var users = JSON.parse(localStorage.getItem('users')) || [];
    
    // Check if the username and password match any stored user
    var authenticatedUser = users.find(user => user.username === username && user.password === password);
    
    if (authenticatedUser) {
        alert('Login successful!');
        // Redirect or perform any other actions here
        window.location.href="file:///C:/xampp/htdocs/home.html";
    } else {
        alert('Invalid username or password.');
    }
}
