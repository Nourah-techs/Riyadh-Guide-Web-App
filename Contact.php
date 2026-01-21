<?php
include('../data/db.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['name'];
    $message = $_POST['comments'];

    $sql = "INSERT INTO `messages` (`UserName`, `Message`) VALUES ('$user_name', '$message')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Message sent successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
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
                <li class="menu__item"><a href="about.html" class="menu__link">About Us</a></li>
                <li class="menu__item selected"><a href="Contact.php" class="menu__link">Contact Us</a></li>
                <li class="menu__item"><a href="login.php" class="menu__link">Login</a></li>
            </ul>
        </nav>
    </header>

    <main class="main">
        <section class="contact">
            <h1 class="contact__title">Contact Us</h1><br>
            <p class="contact__description">We're here to help and answer any questions you might have. We look forward to hearing from you!</p><br>

            <div class="contact__details">
                <ul class="contact__info">
                    <li><strong>Address:</strong> King Abdullah Rd, Riyadh, Saudi Arabia</li><br>
                    <li><strong>Phone:</strong> 0112345880</li><br>
                    <li><strong>Email:</strong> <a href="mailto:RiyadhGuide@gmail.com" class="contact__email">RiyadhGuide@gmail.com</a></li><br>
                </ul>
            </div>

            <form class="contact__form" method="POST" action="">
                <label for="name" class="contact__label">Your Name:</label><br>
                <input id="name" name="name" type="text" class="form-control" required><br>
                <label for="comments" class="contact__label">Your Message:</label><br>
                <textarea id="comments" name="comments" placeholder="Write your message here..." class="form-control" required></textarea><br>
                <button class="button" type="submit">Send</button>
            </form>
        </section>
    </main>

    <footer class="footer">
        <p class="footer__text">
            &copy; 2024 Riyadh Guide | IMAM | CCIS <sup>TM</sup>
        </p>
    </footer>
</body>

</html>




