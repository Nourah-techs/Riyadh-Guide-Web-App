<?php
include('../data/db.php'); 

$item_id = isset($_GET['id']) ? $_GET['id'] : 0;

$item_sql = "SELECT * FROM `item_list` WHERE `ItemID` = $item_id";
$item_result = $conn->query($item_sql);
$item = $item_result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['name'];
    $review_body = $_POST['body'];
    $rating = $_POST['rating'];

    $review_sql = "INSERT INTO `review` (`PlaceID`, `UserName`, `Review`, `Rating`) 
                   VALUES ($item_id, '$user_name', '$review_body', $rating)";
    if ($conn->query($review_sql) === TRUE) {
        echo "<script>alert('Review added successfully!');</script>";
    } else {
        echo "Error: " . $review_sql . "<br>" . $conn->error;
    }
}

$reviews_sql = "SELECT * FROM `review` WHERE `PlaceID` = $item_id";
$reviews_result = $conn->query($reviews_sql);
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Item Details</title>
    <link rel="stylesheet" href="../styles/base.css">
    <link rel="stylesheet" href="../styles/layout.css">
    <link rel="stylesheet" href="../styles/components.css">
    <link rel="stylesheet" hrefbody id="top">
    <header class="header">
        <div class="header__logo">
            <img src="../Assets/logo.png" alt="Riyadh Guide Logo" width="180">
            <span>Riyadh Guide</span>
        </div>
        <nav class="header__menu">
            <ul class="menu">
                <li class="menu__item"><a href="index.php" class="menu__link">Home</a></li>
                <li class="menu__item"><a href="about.html" class="menu__link">About Us</a></li>
                <li class="menu__item"><a href="Contact.php" class="menu__link">Contact Us</a></li>
                <li class="menu__item"><a href="login.php" class="menu__link">Login</a></li>
            </ul>
        </nav>
    </header>

    <main class="main">
        <section class="item-details">
            <h1 class="item-details__title"><?php echo $item['Name']; ?></h1>
            <div class="item-details__content">
                <img src="../Assets/<?php echo $item['Logo']; ?>" alt="<?php echo $item['Name']; ?>" class="item-details__image" width="350">
                <p class="item-details__description"><?php echo $item['Description']; ?></p>
            </div>
        </section>

        <hr>

        <section class="reviews">
            <h2>Reviews</h2>
            <?php while ($review = $reviews_result->fetch_assoc()) { ?>
                <div class="review">
                    <strong><?php echo $review['UserName']; ?></strong>:
                    <span><?php echo $review['Review']; ?> (Rating: <?php echo $review['Rating']; ?>/5)</span>
                </div>
            <?php } ?>
        </section>

        <hr>

        <section class="review-form">
            <h2>Please Review The Place</h2>
            <form method="POST" action="">
                <label for="name">Name:</label><br>
                <input id="name" required type="text" name="name" class="form-control"><br>

                <label for="body">Review:</label><br>
                <textarea id="body" name="body" placeholder="Write your review here..." class="form-control" required></textarea><br>

                <label for="rating">Rating:</label><br>
                <div class="rate">
                    <input type="radio" id="star5" name="rating" value="5" required>
                    <label for="star5">★</label>
                    <input type="radio" id="star4" name="rating" value="4">
                    <label for="star4">★</label>
                    <input type="radio" id="star3" name="rating" value="3">
                    <label for="star3">★</label>
                    <input type="radio" id="star2" name="rating" value="2">
                    <label for="star2">★</label>
                    <input type="radio" id="star1" name="rating" value="1">
                    <label for="star1">★</label>
                </div><br>

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

