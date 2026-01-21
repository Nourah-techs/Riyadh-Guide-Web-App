<?php
include('../data/db.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $logo = $_FILES['logo']['name'];

    $target_dir = "../Assets/"; 
    $target_file = $target_dir . basename($_FILES['logo']['name']);
    move_uploaded_file($_FILES['logo']['tmp_name'], $target_file);
    
    move_uploaded_file($_FILES['logo']['tmp_name'], $target_file);

    $sql = "INSERT INTO `item_list` (`Name`, `Description`, `Category`, `Logo`) 
            VALUES ('$name', '$description', '$category', '$logo')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Item added successfully!');</script>";
        header("Location: control-panel.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Item</title>
    <link rel="stylesheet" href="../styles/base.css">
    <link rel="stylesheet" href="../styles/layout.css">
    <link rel="stylesheet" href="../styles/components.css">
    <link rel="stylesheet" href="../styles/states.css">
</head>
<body id="top">
    <header class="header">
        <div class="header__logo">
            <img src="../Assets/logo.png" alt="Riyadh Guide Logo" width="180">
            <span>Riyadh Guide</span>
        </div>
        <nav class="header__menu">
            <ul class="menu">
                <li class="menu__item"><a href="index.php" class="menu__link">Home</a></li>
                <li class="menu__item"><a href="control-panel.php" class="menu__link">Control Panel</a></li>
                <li class="menu__item selected"><a href="add-item.php" class="menu__link">Add Item</a></li>
            </ul>
        </nav>
    </header>
    <div class="add-item-form">
        <h1>Add Item</h1>
        <form method="POST" enctype="multipart/form-data">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" class="form-control" required><br>

            <label for="description">Description:</label><br>
            <textarea id="description" name="description" class="form-control" required></textarea><br>

            <label for="category">Category:</label><br>
            <select id="category" name="category" class="form-control">
                <option value="Riyadh_season">Riyadh Season</option>
                <option value="Tourism">Tourism</option>
                <option value="Cultural">Cultural</option>
            </select><br>

            <label for="logo">Item Logo:</label>
            <input type="file" id="logo" name="logo" class="form-control" required>

            <button type="submit" class="button">Submit</button>
        </form>
    </div>
    <footer class="footer">
        <p class="footer__text">
            &copy; 2024 Riyadh Guide | IMAM | CCIS <sup>TM</sup>
        </p>
    </footer>
</body>
</html>

