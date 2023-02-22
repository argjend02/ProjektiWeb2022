<html>
<link rel="stylesheet" href="style.css" />
<style>
    .product {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 300px;
    }

    .product img {
        max-width: 100%;
        margin-bottom: 20px;
    }

    .product-name {
        font-size: 24px;
        margin-bottom: 10px;
        text-align: center;
    }

    .product-description {
        font-size: 16px;
        margin-bottom: 20px;
        text-align: center;
    }

    .product-details {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }

    .product-price {
        font-size: 24px;
        font-weight: bold;
    }

    .product-buy-button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .product-buy-button:hover {
        background-color: #3e8e41;
    }
</style>
<?php
include('header.php');
include_once('database/product.php');


$product = new Product();



if (isset($_GET['product'])) {
    $productId = $_GET['product'];

    $productData = $product->getIdActive($productId);




    if ($productData) {
        ?>
        <div class="product">
            <img src="uploads/<?php echo $productData['image']; ?>" alt="">
            <h2 class="product-name">
                <?php echo $productData['name']; ?>
            </h2>
            <p class="product-description">
                <?php echo $productData['description']; ?>
            </p>
            <div class="product-details">
                <p class="product-price">
                    <?php echo $productData['price']; ?>
                    <?php echo $productData['description'] . '$'; ?>

                </p>
                <button class="product-buy-button">Buy Now</button>
            </div>
        </div>
        <?php

    }
}
include('footer.php');
?>

</html>