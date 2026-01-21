<?php
include('../data/db.php');
session_start(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `admin` WHERE `Username` = '$username' AND `Password` ='$password' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $username; 
        header("Location: control-panel.php"); 
        exit();
    } else {
        $error_message = "Invalid Username or Password!";
    }
}
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/base.css">
    <link rel="stylesheet" href="../styles/layout.css">
    <link rel="stylesheet" href="../styles/components.css">
    <link rel="stylesheet" href="../styles/states.css">
</head>

<body id="top">
    <header class="header">
        <div class="header__logo">
            <img src="../Assets/logo.png" alt="Riyadh Guide Logo" width="150">
            <span>Riyadh Guide</span>
        </div>
        <nav class="header__menu">
            <ul class="menu">
                <li class="menu__item"><a href="index.php" class="menu__link">Home</a></li>
                <li class="menu__item"><a href="about.html" class="menu__link">About Us</a></li>
                <li class="menu__item"><a href="Contact.php" class="menu__link">Contact Us</a></li>
                <li class="menu__item selected"><a href="login.php" class="menu__link">Login</a></li>
            </ul>
        </nav>
    </header>
    <main class="main">
        <section class="login">
            <h1 class="login__title">Login</h1>
            <?php if (isset($error_message)) { ?>
                <p style="color: red;"><?php echo $error_message; ?></p>
            <?php } ?>
            <form class="login__form" method="POST" action="">
                <label for="username">User Name:</label><br>
                <input id="username" required type="text" name="username" placeholder="Name" class="form-control"><br>

                <label for="password">Password:</label><br>
                <input id="password" required type="password" name="password" class="form-control"><br>

                <div class="login__buttons">
                    <button class="button" type="submit">Submit</button>
                    <button class="button" type="reset">Clear</button>
                </div>
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
