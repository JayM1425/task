<?php
$conn = new mysqli("localhost", "root", "", "key_tracker");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, staff_name, key_name, time_taken, return_time FROM keys_issued ORDER BY time_taken DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Issued Keys</title>
    <style>
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f3f3f3;
        }
        body {
            font-family: Arial;
        }
        .center-btn {
            text-align: center;
            margin-bottom: 20px;
        }
        .center-btn button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #1976d2;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .center-btn button:hover {
            background-color: #1565c0;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Issued Keys.</h2>

    <div class="center-btn">
        <a href="index.html">
        <a href="index.php">Back to dashboard.</a>
        </a>
    </div>

<table>
    <tr>
        <th>ID</th>
        <th>Staff name</th>
        <th>Key name</th>
        <th>Time taken</th>
        <th>Expected return time</th>
        <th>Actions</th> <!-- New column -->
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['staff_name']}</td>
                    <td>{$row['key_name']}</td>
                    <td>{$row['time_taken']}</td>
                    <td>{$row['return_time']}</td>
                    <td>
                        
                        <a href='?id={$row['id']}' onclick=\"return confirm('Are you sure he/she already returned a key!!, so you want to remove from list😐?');\" style='color: black;'>Returned</a>
                    </td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='6' style='text-align:center;'>No records found</td></tr>";
    }
    ?>

    <?php
$conn = new mysqli("localhost", "root", "", "key_tracker");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM keys_issued WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
       echo "<script>window.location.href='view_keys.php';</script>";
exit();
 // Redirect after deletion
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "";
}
$conn->close();
?>

</table>

</body>
</html>
