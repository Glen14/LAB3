<?php
session_start();
if (!isset($_SESSION['education_info'])) {
    header("Location: jobform2.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['work_info'] = [
        'job_title' => htmlspecialchars($_POST['job_title']),
        'company_name' => htmlspecialchars($_POST['company_name']),
        'years_of_experience' => htmlspecialchars($_POST['years_of_experience']),
        'responsibilities' => htmlspecialchars($_POST['responsibilities']),
    ];
    header("Location: review.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Step 3: Work Experience</title>
</head>
<body>
    <form method="POST" action="jobform3.php">
        <label for="job_title">Previous Job Title:</label>
        <input type="text" id="job_title" name="job_title" required><br>

        <label for="company_name">Company Name:</label>
        <input type="text" id="company_name" name="company_name" required><br>

        <label for="years_of_experience">Years of Experience:</label>
        <input type="number" id="years_of_experience" name="years_of_experience" required><br>

        <label for="responsibilities">Key Responsibilities:</label><br>
        <textarea id="responsibilities" name="responsibilities" required></textarea><br>

        <input type="submit" value="Review">
    </form>
</body>
</html>
