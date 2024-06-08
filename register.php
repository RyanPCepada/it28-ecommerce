<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArsyArts - Register</title>
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
        .register-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .register-container h2 {
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
        .btn-register {
            background-color: #28a745;
            border-color: #28a745;
            padding: 10px;
            font-size: 18px;
        }
        .btn-register:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .login-link {
            margin-top: 10px;
            font-size: 16px;
        }
        .login-link a {
            color: #28a745;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2 class="text-center">Register</h2>
        <?php
        $error_message = "";
        $username = $email = $password = $confirmPassword = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require 'portraits/config.php';

            $username = trim($_POST["username"]);
            $email = trim($_POST["email"]);
            $password = trim($_POST["password"]);
            $confirmPassword = trim($_POST["confirmPassword"]);

            // Basic validation
            if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
                $error_message = "Please fill all fields.";
            } elseif ($password !== $confirmPassword) {
                $error_message = "Passwords do not match.";
            } else {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                try {
                    // Insert into the database
                    $sql = "INSERT INTO customers (username, email, password, created_at) VALUES (:username, :email, :password, :created_at)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([
                        ':username' => $username,
                        ':email' => $email,
                        ':password' => $hashedPassword,
                        ':created_at' => date('Y-m-d H:i:s')
                    ]);
                    echo "<script>alert('Registration successful.'); window.location.href = 'index.php';</script>";
                    exit;
                } catch (PDOException $e) {
                    $error_message = "Error: " . $e->getMessage();
                }
            }
        }
        ?>
        <?php if (!empty($error_message)): ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($username) ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?= htmlspecialchars($password) ?>" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" value="<?= htmlspecialchars($confirmPassword) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-register">Register</button>
            <div class="text-center login-link">
                <p>Already have an account? <a href="index.php">Login</a></p>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
