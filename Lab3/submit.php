<?php
session_start();
if (!isset($_SESSION['personal_info']) || !isset($_SESSION['education_info']) || !isset($_SESSION['work_info'])) {
    header("Location: jobform1.php");
    exit();
}

// Collect all information
$application = [
    'personal_info' => $_SESSION['personal_info'],
    'education_info' => $_SESSION['education_info'],
    'work_info' => $_SESSION['work_info'],
];

// Save to JSON file
$applications = json_decode(file_get_contents('applications.json'), true) ?? [];
$applications[] = $application;
file_put_contents('applications.json', json_encode($applications));

// Clear session data
session_destroy();

echo "<h2>Application Submitted Successfully!</h2>";
echo "<p>A confirmation email has been sent to: " . htmlspecialchars($application['personal_info']['email']) . "</p>";
?>
