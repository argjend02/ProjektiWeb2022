<div class="header">
<a href="index.php" class="left-section">
    <h1 style="color: white; margin-left: 10px">Tech-Shop</h1>
    <img class="tech-logo" src="img/shopping-cart.png" />
</a>
<div class="middle-section">
    <input class="search-bar" type="text" placeholder="Search" />
    <button class="search-button">
    <img class="search-icon" src="icons/search.svg" alt="" />
    </button>
</div>
<div class="right-section">
    <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="aboutus.php">About us</a></li>
    <li><a href="Contact.php">Contact</a></li>
    <?php
    session_start();
    if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] === false) {
        echo "<li><a href='login1.php'>Log In</a></li>";
    } else {
        echo "<li><a href='logout.php'>Log Out</a></li>";
    }
    ?>

    </ul>
</div>
</div>
