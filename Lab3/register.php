<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // Load existing users
    $users = json_decode(file_get_contents('users.json'), true) ?? [];
    
    // Check if username exists
    if (isset($users[$username])) {
        $error = "Username already exists!";
    } else {
        // Store new user
        $users[$username] = ['email' => $email, 'password' => $password];
        file_put_contents('users.json', json_encode($users));
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="register.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Register">
    </form>
    <p><a href="index.php">Already have an account? Login</a></p>
</body>
</html>
