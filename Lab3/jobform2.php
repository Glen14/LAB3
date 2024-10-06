<?php
session_start();
if (!isset($_SESSION['personal_info'])) {
    header("Location: job1.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['education_info'] = [
        'degree' => htmlspecialchars($_POST['degree']),
        'field_of_study' => htmlspecialchars($_POST['field_of_study']),
        'institution' => htmlspecialchars($_POST['institution']),
        'year_of_graduation' => htmlspecialchars($_POST['year_of_graduation']),
    ];
    header("Location: jobform3.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Step 2: Educational Background</title>
</head>
<body>
    <form method="POST" action="jobform2.php">
        <label for="degree">Highest Degree Obtained:</label>
        <input type="text" id="degree" name="degree" required><br>

        <label for="field_of_study">Field of Study:</label>
        <input type="text" id="field_of_study" name="field_of_study" required><br>

        <label for="institution">Name of Institution:</label>
        <input type="text" id="institution" name="institution" required><br>

        <label for="year_of_graduation">Year of Graduation:</label>
        <input type="text" id="year_of_graduation" name="year_of_graduation" required><br>

        <input type="submit" value="Next">
    </form>
</body>
</html>
