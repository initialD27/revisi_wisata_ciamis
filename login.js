document.getElementById('loginForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const loginMessage = document.getElementById('loginMessage');

    try {
        const response = await fetch('api/auth/login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                username: username,
                password: password
            })
        });

        const data = await response.json();

        if (response.ok) {
            loginMessage.textContent = 'Login berhasil!';
            loginMessage.style.color = 'green';
            
            // Simpan data user ke localStorage
            localStorage.setItem('user', JSON.stringify(data));
            
            // Redirect ke halaman admin setelah 1 detik
            setTimeout(() => {
                window.location.href = 'admin.html';
            }, 1000);
        } else {
            loginMessage.textContent = data.message || 'Login gagal!';
            loginMessage.style.color = 'red';
        }
    } catch (error) {
        loginMessage.textContent = 'Terjadi kesalahan saat login';
        loginMessage.style.color = 'red';
        console.error('Error:', error);
    }
});

// Cek status login
function checkLoginStatus() {
    const user = localStorage.getItem('user');
    if (!user) {
        window.location.href = 'login.html';
    }
}

// Fungsi untuk logout
function logout() {
    localStorage.removeItem('user');
    window.location.href = 'login.html';
}