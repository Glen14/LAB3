<?php
session_start();
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['personal_info'] = [
        'full_name' => htmlspecialchars($_POST['full_name']),
        'email' => htmlspecialchars($_POST['email']),
        'phone_number' => htmlspecialchars($_POST['phone_number'])
    ];
    header("Location: jobform2.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Step 1: Personal Information</title>
</head>
<body>
    <form method="POST" action="jobform1.php">
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required><br>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required><br>

        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" required><br>

        <input type="submit" value="Next">
    </form>
</body>
</html>
