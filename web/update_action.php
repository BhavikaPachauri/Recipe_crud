<?php
include 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$prep_time = $_POST['prep_time'];
$difficulty = $_POST['difficulty'];
$vegetarian = $_POST['vegetarian'];

$sql = "UPDATE recipe SET name = ?, prep_time = ?, difficulty = ?, vegetarian = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssii", $name, $prep_time, $difficulty, $vegetarian, $id);

if ($stmt->execute()) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
