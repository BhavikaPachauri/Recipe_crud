<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Recipe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Read Recipe</h2>
        <a href="index.php" class="btn btn-primary mb-3">Back to List</a>
        <?php
        include 'db.php';

        $id = $_GET['id'];
        $sql = "SELECT * FROM recipe WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
        ?>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td><?php echo $row['id']; ?></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><?php echo $row['name']; ?></td>
                </tr>
                <tr>
                    <th>Preparation Time</th>
                    <td><?php echo $row['prep_time']; ?></td>
                </tr>
                <tr>
                    <th>Difficulty</th>
                    <td><?php echo $row['difficulty']; ?></td>
                </tr>
                <tr>
                    <th>Vegetarian</th>
                    <td><?php echo $row['vegetarian'] ? 'Yes' : 'No'; ?></td>
                </tr>
            </table>
        <?php
        } else {
            echo "<p>No record found</p>";
        }

        $stmt->close();
        $conn->close();
        ?>
    </div>
</body>
</html>
