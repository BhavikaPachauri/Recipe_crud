<?php
include 'db.php';

$id = $_POST['id'];
$rating = $_POST['rating'];

$sql = "UPDATE recipe SET rating = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $rating, $id);

if ($stmt->execute()) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
