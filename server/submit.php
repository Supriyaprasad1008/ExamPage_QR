<?php
include "db.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid request";
    exit;
}

// Correct POST keys
$name = trim($_POST['name'] ?? '');
$collegeId = trim($_POST['college_id'] ?? '');
$stream = trim($_POST['stream'] ?? '');

// Server-side validation
if ($name === '' || $collegeId === '' || $stream === '') {
    echo "❌ Missing form data";
    exit;
}

// SQL query (use correct column names)
$sql = "SELECT `Exam date`, `Exam time`, `Room no.`, `Subject ID`
        FROM schedule
        WHERE `College-id`='$collegeId' AND `Stream`='$stream'";

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);

    // Redirect (NO echo before this)
    header("Location: ../result.php?" .
        "name=" . urlencode($name) .
        "&college=" . urlencode($collegeId) .
        "&stream=" . urlencode($stream) .
        "&date=" . urlencode($row['Exam date']) .
        "&time=" . urlencode($row['Exam time']) .
        "&room=" . urlencode($row['Room no.']) .
        "&subject=" . urlencode($row['Subject ID'])
    );
    exit;

} else {
    echo "❌ No exam schedule found";
}
?>
