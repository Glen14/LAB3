session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $users = json_decode(file_get_contents('users.json'), true);
    foreach ($users as $user) {
        if ($user['username'] == $username && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;

            if (isset($_POST['remember_me'])) {
                setcookie('username', $username, time() + (86400 * 7)); // 7 days
            }

            header("Location: job_form_step1.php");
            exit();
        }
    }

    echo "Invalid credentials!";
}

// Check if the username is remembered in the cookie
if (isset($_COOKIE['username'])) {
    $remembered_username = $_COOKIE['username'];
}
