<?php

include 'db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $staff_name = $_POST['staff_name'];
    $key_name = $_POST['key_name'];
    $time_taken = $_POST['time_taken'];
    $return_time = $_POST['return_time'];

    $sql = "INSERT INTO keys_issued (staff_name, key_name, time_taken, return_time) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $staff_name, $key_name, $time_taken, $return_time);

if ($stmt->execute()) {
    echo "<script>alert('Key entry added successfully!'); window.location.href='index.php';</script>";
} else {
    echo "<script>alert('Error: " . $stmt->error . "'); window.history.back();</script>";
}


    $stmt->close();
    $conn->close();
}
?>
