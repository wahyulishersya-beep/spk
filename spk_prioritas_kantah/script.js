
const validUsername = "admin";
const validPassword = "1234";

document.getElementById("loginForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Mencegah pengiriman form

    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    if (username === validUsername && password === validPassword) {
        alert("Login berhasil!");
        window.location.href = "dashboard.html"
    } else {
        alert("Username atau password salah !!!.");
    }
});