<?php
include('../data/db.php');

if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];

    // Fetch the item data
    $sql = "SELECT * FROM `item_list` WHERE `ItemID` = $edit_id";
    $result = $conn->query($sql);
    $item = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $logo = $_FILES['logo']['name'];

    // Handle file upload
    if (!empty($logo)) {
        $target_dir = "../Assets/";
        $target_file = $target_dir . basename($logo);
        move_uploaded_file($_FILES['logo']['tmp_name'], $target_file);
    } else {
        $logo = $item['Logo'];
    }

    // Update the item in the database
    $update_sql = "UPDATE `item_list` SET 
                   `Name` = '$name', 
                   `Description` = '$description', 
                   `Logo` = '$logo' 
                   WHERE `ItemID` = $edit_id";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Item updated successfully!');</script>";
        echo "<script>window.location.href = 'control-panel.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Item</title>
    <link rel="stylesheet" href="../styles/base.css">
    <link rel="stylesheet" href="../styles/layout.css">
    <link rel="stylesheet" href="../styles/components.css">
    <link rel="stylesheet" href="../styles/states.css">
</head>

<body>
    <header class="header">
        <div class="header__logo">
            <img src="../Assets/logo.png" alt="Riyadh Guide Logo" width="180">
            <span>Riyadh Guide</span>
        </div>
        <nav class="header__menu">
            <ul class="menu">
                <li class="menu__item"><a href="index.php" class="menu__link">Home</a></li>
                <li class="menu__item"><a href="control-panel.php" class="menu__link">Control Panel</a></li>
                <li class="menu__item"><a href="add-item.php" class="menu__link">Add Item</a></li>
                <li class="menu__item selected"><a href="edit-item.php" class="menu__link">Edit Item</a></li>
            </ul>
        </nav>
    </header>
    <div class="edit-item">
        <h1>Edit Item</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $item['Name']; ?>" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo $item['Description']; ?></textarea>

            <label for="logo">Logo:</label>
            <input type="file" id="logo" name="logo">
            <img src="../Assets/<?php echo $item['Logo']; ?>" alt="Current Logo" width="100">

            <button type="submit" class="button">Update</button>
        </form>
    </div>
    <footer class="footer">
        <p class="footer__text">
            &copy; 2024 Riyadh Guide | IMAM | CCIS <sup>TM</sup>
        </p>
    </footer>
</body>

</html>
