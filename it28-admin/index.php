<?php
session_start();
include 'db/config.php'; // Make sure to include your database connection file

$email_or_username = '';
$password = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email_or_username = trim($_POST['email_or_username']);
    $password = trim($_POST['password']);
    
    // Function to check admin login with plain text password
    function checkAdmin($pdo, $email_or_username, $password) {
        $query = "SELECT * FROM admin WHERE (email = :email_or_username OR username = :email_or_username) AND password = :password";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['email_or_username' => $email_or_username, 'password' => $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    
    $admin_result = checkAdmin($pdo, $email_or_username, $password);
    if ($admin_result) {
        $_SESSION['admin_id'] = $admin_result['admin_id'];
        header("Location: public/dashboard.php");
        exit();
    }
    
    // If no match, show an error
    $error = "Invalid email/username or password.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArsyArts - Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding: 20px;
            background-color: #f8f9fa;
            margin: 0;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }
        .form-control {
            font-size: 16px;
            padding: 10px;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #28a745;
        }
        .btn-login {
            background-color: #28a745;
            border-color: #28a745;
            padding: 10px;
            font-size: 18px;
        }
        .btn-login:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .register-link {
            margin-top: 10px;
            font-size: 16px;
        }
        .register-link a {
            color: #28a745;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="text-center">Login</h2>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php } ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="email_or_username">Username or Email</label>
                <input type="text" class="form-control" id="email_or_username" name="email_or_username" value="<?= htmlspecialchars($email_or_username) ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?= htmlspecialchars($password) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-login">Login</button>
            <div class="text-center register-link">
                <p>Don't have an account? <a href="./public/user/register.php">Register</a></p>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
