<?php
// Logika PHP untuk proses login diletakkan di bagian paling atas
session_start();

// Ganti detail login ini sesuai kebutuhan Anda
$admin_email = "admin@quicktune.com";
$admin_pass  = "admin123";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email == $admin_email && $password == $admin_pass) {
        $_SESSION['admin_logged_in'] = true;
        // Ganti 'dashboard_admin.php' dengan nama file dashboard Anda
        header("Location: indexadmin.php");
        exit;
    } else {
        $error = "Email atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - QuickTune</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <style>
        /* CSS DALAM SATU FILE */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            /* Latar belakang menggunakan gambar pemandangan estetik */
            background: url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') no-repeat;
            background-size: cover;
            background-position: center;
        }

        /* Navbar */
        .navbar {
            position: absolute;
            top: 0;
            width: 100%;
            padding: 20px 50px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            margin-left: 25px;
            font-weight: 500;
            font-size: 14px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }

        .btn-login-nav {
            border: 1.5px solid #fff;
            padding: 6px 20px;
            border-radius: 20px;
            transition: 0.3s;
        }

        .btn-login-nav:hover {
            background: #fff;
            color: #333;
        }

        /* Glassmorphism Login Box */
        .wrapper {
            position: relative;
            width: 400px;
            padding: 40px;
            background: rgba(255, 255, 255, 0.15); /* Transparansi putih */
            backdrop-filter: blur(15px); /* Efek Blur di belakang kotak */
            -webkit-backdrop-filter: blur(15px);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            color: #fff;
        }

        h2 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 25px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .input-group {
            position: relative;
            width: 100%;
            border-bottom: 2px solid #fff;
            margin: 30px 0;
        }

        .input-group label {
            font-size: 14px;
        }

        .input-group input {
            width: 100%;
            height: 40px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 16px;
            color: #fff;
            padding-right: 30px;
        }

        /* Placeholder warna putih */
        .input-group input::placeholder {
            color: rgba(255,255,255,0.7);
        }

        .input-group i {
            position: absolute;
            right: 5px;
            top: 25px;
            font-size: 20px;
        }

        .forgot {
            display: block;
            text-align: right;
            font-size: 12px;
            color: #fff;
            text-decoration: none;
            margin-top: 5px;
        }

        .remember {
            font-size: 14px;
            margin: -15px 0 20px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .btn-login {
            width: 100%;
            height: 45px;
            background: rgba(255, 255, 255, 0.9);
            border: none;
            outline: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 700;
            color: #333;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #fff;
            transform: scale(1.03);
            box-shadow: 0 5px 15px rgba(255,255,255,0.3);
        }

        .register-link {
            font-size: 14px;
            text-align: center;
            margin-top: 20px;
        }

        .register-link a {
            color: #fff;
            font-weight: 700;
            text-decoration: none;
        }

        .error-msg {
            background: rgba(255, 0, 0, 0.2);
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            font-size: 13px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="nav-links">
            <a href="index.php">HOME</a>
            <a href="#">ABOUT</a>
            <a href="#">SERVICE</a>
            <a href="#">CONTACT</a>
            <a href="#" class="btn-login-nav">LOGIN</a>
        </div>
    </nav>

    <div class="wrapper">
        <form action="" method="POST">
            <h2>Login</h2>
            
            <?php if(isset($error)): ?>
                <div class="error-msg"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter your email" required>
                <i class='bx bx-envelope'></i>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter password" required>
                <i class='bx bx-lock-alt'></i>
                <a href="#" class="forgot">Forgot Password?</a>
            </div>

            <div class="remember">
                <input type="checkbox" id="rem"> 
                <label for="rem">Remember Me</label>
            </div>

            <button type="submit" class="btn-login">Login</button>

            <div class="register-link">
                <p>Don't have an Account? <a href="#">Register</a></p>
            </div>
        </form>
    </div>

</body>
</html>