<html>

<head>
    <title>Product Page</title>
    <link rel="stylesheet" href="file.css">
    <link rel="stylesheet" href="style.css" />
    <style>
        * {
            text-decoration: none;
            color: black
        }
    </style>
</head>

<body>
    <?php include('header.php'); ?>
    <div class="header2">
        <div id="elements">
            <ul>
                <li><a href="products.php">All Categories</a></li>
                <li><a href="#">White Tech</a></li>
                <li><a href="#">TV</a></li>
                <li><a href="#">Laptops</a></li>
                <li><a href="#">Consoles</a></li>
                <li><a href="#">Smartphones</a></li>
            </ul>
        </div>
    </div>
    <div class='container1'>

        <?php
        include('database/product.php');
        $model = new Product();
        $products = $model->getProducts();
        // include_once('buy.php');
        foreach ($products as $product): ?>
            <div class="card1">
                <a href="buy.php?product=<?= $product['id']; ?>">

                    <div class="product-image">
                        <img src="uploads/<?php echo $product['image']; ?>" alt="">
                    </div>
                    <div class="product-info">
                        <h4>
                            <?php echo $product['name']; ?>
                        </h4>
                        <h4>
                            <?php echo $product['description']; ?>
                        </h4>
                        <h4>
                            <?php echo $product['price']; ?>$
                        </h4>
                    </div>

                    <div class="btn1">
                        <button type="button">buy now</button>
                    </div>
                </a>
            </div>

        <?php endforeach; ?>
    </div>
    <?php include('footer.php') ?>

</body>

</html>