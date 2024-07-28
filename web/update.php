<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Recipe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Update Recipe</h2>
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
            <form action="update_action.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Recipe Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="prep_time" class="form-label">Preparation Time</label>
                    <input type="text" class="form-control" id="prep_time" name="prep_time" value="<?php echo $row['prep_time']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="difficulty" class="form-label">Difficulty</label>
                    <input type="text" class="form-control" id="difficulty" name="difficulty" value="<?php echo $row['difficulty']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="vegetarian" class="form-label">Vegetarian</label>
                    <select class="form-control" id="vegetarian" name="vegetarian" required>
                        <option value="1" <?php echo $row['vegetarian'] ? 'selected' : ''; ?>>Yes</option>
                        <option value="0" <?php echo !$row['vegetarian'] ? 'selected' : ''; ?>>No</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
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
