<?php
session_start();
if (!isset($_SESSION['personal_info']) || !isset($_SESSION['education_info']) || !isset($_SESSION['work_info'])) {
    header("Location: job_form_step1.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Review Your Application</title>
</head>
<body>
    <h3>Review Your Application</h3>
    <h4>Personal Information</h4>
    <p>Full Name: <?php echo htmlspecialchars($_SESSION['personal_info']['full_name']); ?></p>
    <p>Email: <?php echo htmlspecialchars($_SESSION['personal_info']['email']); ?></p>
    <p>Phone Number: <?php echo htmlspecialchars($_SESSION['personal_info']['phone_number']); ?></p>

    <h4>Educational Background</h4>
    <p>Degree: <?php echo htmlspecialchars($_SESSION['education_info']['degree']); ?></p>
    <p>Field of Study: <?php echo htmlspecialchars($_SESSION['education_info']['field_of_study']); ?></p>
    <p>Institution: <?php echo htmlspecialchars($_SESSION['education_info']['institution']); ?></p>
    <p>Year of Graduation: <?php echo htmlspecialchars($_SESSION['education_info']['year_of_graduation']); ?></p>

    <h4>Work Experience</h4>
    <p>Job Title: <?php echo htmlspecialchars($_SESSION['work_info']['job_title']); ?></p>
    <p>Company Name: <?php echo htmlspecialchars($_SESSION['work_info']['company_name']); ?></p>
    <p>Years of Experience: <?php echo htmlspecialchars($_SESSION['work_info']['years_of_experience']); ?></p>
    <p>Responsibilities: <?php echo nl2br(htmlspecialchars($_SESSION['work_info']['responsibilities'])); ?></p>

    <form method="POST" action="submit.php">
        <input type="submit" value="Submit Application">
    </form>

    <p><a href="job_form_step1.php">Edit Personal Information</a></p>
    <p><a href="job_form_step2.php">Edit Educational Background</a></p>
    <p><a href="job_form_step3.php">Edit Work Experience</a></p>
</body>
</html>
