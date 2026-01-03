<?php
include "db.php";

$name = $_POST['name'];
$collegeId = $_POST['collegeId'];
$stream = $_POST['stream'];

$sql = "SELECT `Exam date`, `Exam time`, `Room no.`, `Subject ID`
        FROM schedule
        WHERE `College-id`='$collegeId' AND `Stream`='$stream'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    header("Location: ../result.php?
        name=$name&
        college=$collegeId&
        stream=$stream&
        date={$row['Exam date']}&
        time={$row['Exam time']}&
        room={$row['Room no.']}&
        subject={$row['Subject ID']}
    ");
} else {
    echo "❌ No exam schedule found";
}
?>
