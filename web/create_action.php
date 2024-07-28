<?php
include 'db.php';

$name = $_POST['name'];
$prep_time = $_POST['prep_time'];
$difficulty = $_POST['difficulty'];
$vegetarian = $_POST['vegetarian'];

$sql = "INSERT INTO recipe (name, prep_time, difficulty, vegetarian) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $name, $prep_time, $difficulty, $vegetarian);

if ($stmt->execute()) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
