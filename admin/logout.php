<?php
session_start(); // Wajib panggil session_start() dulu sebelum bisa menghapusnya

// 1. Hapus semua variabel session
$_SESSION = array();

// 2. Jika session menggunakan cookies (bawaan PHP), hapus cookie-nya juga dari browser
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 3. Hancurkan session secara total di server
session_destroy();

// 4. Lemparkan admin kembali ke form login
header("Location: login.php");
exit();
?>