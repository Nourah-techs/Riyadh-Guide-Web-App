<?php
include('../data/db.php'); 

$sql = "SELECT * FROM `item_list`";
$result = $conn->query($sql);
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Riyadh Guide</title>
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
                <li class="menu__item selected"><a href="index.php" class="menu__link">Home</a></li>
                <li class="menu__item"><a href="about.html" class="menu__link">About Us</a></li>
                <li class="menu__item"><a href="Contact.php" class="menu__link">Contact Us</a></li>
                <li class="menu__item"><a href="login.php" class="menu__link">Login</a></li>
            </ul>
        </nav>
    </header>
    <main class="main">
        <section class="gallery">
            <h1 class="gallery__title">Places to Visit</h1>
            <div class="gallery__grid">
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <div class="gallery__item">
                        <a href="item_pr.php?id=<?php echo $row['ItemID']; ?>" class="gallery__link">
                            <div class="gallery__image-wrapper">
                                <img src="../Assets/<?php echo $row['Logo']; ?>" alt="<?php echo $row['Name']; ?>" class="gallery__image">
                            </div>
                            <h2 class="gallery__desc"><?php echo $row['Name']; ?></h2>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </section>
    </main>
    <footer class="footer">
        <p class="footer__text">
            &copy; 2024 Riyadh Guide | IMAM | CCIS <sup>TM</sup>
        </p>
    </footer>
</body>

</html>




