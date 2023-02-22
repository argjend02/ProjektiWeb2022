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

            <?php if (isset($_COOKIE['user'])): ?>
                <li>
                    <select onChange='redirect(this.value)'>
                        <option value=''>Select an option</option>
                        <option value='dashboard.php'>Post a product</option>
                        <option value='myInfo.php'><a>User info</a></option>
                        <?php
                        $user = json_decode($_COOKIE["user"]);
                        if ($user->isAdmin):
                            ?>
                            <option value='admin.php'><a>Admin panel</a></option>
                        <?php endif; ?>>
                    </select>
                </li>
                <li>
                    <a href='logout.php'>Log Out</a>
                </li>
            <?php else: ?>
                <li><a href='login1.php'>Log In</a></li>
            <?php endif; ?>

            <!-- <li>
                <form action="dashboard.php" method="get">
                    <label for="select-option">Select an option:</label>
                    <select id="select-option" name="option">
                        <option value="value1">Option 1</option>
                        <option value="value2">Option 2</option>
                    </select>
                    <button type="submit">Submit</button>
                </form>
            </li> -->

        </ul>

    </div>
</div>
<script>
    function redirect(value) {
        if (value) {
            window.location.href = value
        }
    }
</script>