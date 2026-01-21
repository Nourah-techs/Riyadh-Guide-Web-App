<?php
include('../data/db.php');

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM `item_list` WHERE `ItemID` = $delete_id";
    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('Item deleted successfully!');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$sql = "SELECT * FROM `item_list`";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Control Panel</title>
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
                <li class="menu__item selected"><a href="control-panel.php" class="menu__link">Control Panel</a></li>
                <li class="menu__item"><a href="add-item.php" class="menu__link">Add Item</a></li>
            </ul>
        </nav>
    </header>
    <div class="control-panel">
        <h1>Items List</h1>
        <table class="item-table">
            <thead>
           <div style="justify-content: center; align-items: center;"> 
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th>Logo</th>
                    <th>Manage</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['ItemID']; ?></td>
                        <td><?php echo $row['Name']; ?></td>
                        <td><?php echo $row['Description']; ?></td>
                        <td>
                            <img src="../Assets/<?php echo $row['Logo']; ?>" alt="<?php echo $row['Name']; ?>" width="100">
                </td> 
                        <td>
                             <div style="display: flex; ">
                                <a  href="edit-item.php?edit_id=<?php echo $row['ItemID']; ?>" class="button">Edit</a>
                                <a href="control-panel.php?delete_id=<?php echo $row['ItemID']; ?>" class="button">Delete</a>
                            </div>
                        </td>
                        </div>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <footer class="footer">
        <p class="footer__text">
            &copy; 2024 Riyadh Guide | IMAM | CCIS <sup>TM</sup>
        </p>
    </footer>
</body>

</html>                   