<html>

<head>
    <link rel="stylesheet" href="style.css" />
</head>

<style>
    .product-container {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        margin: 20px 0;
        border: 1px solid #ccc;
        padding: 10px;
    }

    .product-image {
        flex: 1;
    }

    .product-image img {
        display: block;
        width: 100%;
        height: auto;
        transition: transform 0.2s ease-in-out;
    }

    .product-image img:hover {
        transform: scale(1.1);
    }

    .product-details {
        flex: 2;
        margin-left: 20px;
        padding: 10px;
        border-left: 1px solid #ccc;
    }

    .product-details h1 {
        font-size: 24px;
        font-weight: bold;
        margin: 0;
        margin-bottom: 10px;
    }

    .product-details p {
        font-size: 16px;
        margin: 0;
        margin-bottom: 10px;
    }

    .product-details p.product-price {
        font-size: 20px;
        font-weight: bold;
        color: #B12704;
    }

    .product-details p.product-author {
        font-size: 14px;
        font-style: italic;
        color: #999;
        margin-top: 20px;
    }

    .add-to-cart-button {
        background-color: #FF9900;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
    }

    .add-to-cart-button:hover {
        background-color: #FFB84D;
    }

    .payment-methods {
        margin-top: 20px;
    }

    .payment-methods p {
        font-size: 16px;
        margin-bottom: 10px;
    }

    .iconsBuy {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
    }

    .iconsBuy img:hover {
        transform: translateY(-4px);
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.16);
        cursor: pointer;
    }

    .iconsBuy img:hover i {
        color: #fff;
    }

    .iconsBuy img:hover:after {
        transform: translate(0) scale(1.2);
    }



    .iconsBuy img {
        width: 50px;
        height: auto;
        margin-right: 20px;
    }
</style>

<?php
include('header.php');

include_once('database/product.php');
include_once('database/user.php');

$product = new Product();
$user = new User();

if (isset($_GET['product']) && isset($_GET['user'])) {
    $productId = $_GET['product'];
    $userId = $_GET['user'];

    $productData = $product->getIdActive($productId);

    if ($productData) {
        $userData = array(
            'id' => $userId,
            'name' => $productData['user_name'],
        );
        ?>

        <body>

            <div class="product-container">
                <div class="product-image">
                    <img src="uploads/<?php echo $productData['image']; ?>" alt="Product Name" class="small-image">
                </div>
                <div class="product-details">
                    <h1>
                        <?php echo $productData['name']; ?>
                    </h1>
                    <p class="product-description">
                        <?php echo $productData['description']; ?>
                    </p>
                    <p class="product-price">
                        <?php echo $productData['price'] . '$'; ?>
                    </p>
                    <p class="product-author">Posted by
                        <?php echo $productData['user_name']; ?>
                    </p>
                    <button class="add-to-cart-button">Add to Cart</button>
                    <div class="payment-methods">
                        <h4>Me ne, gjithmone me e thjeshte per te marre produktin tuaj ne shtepi.<br> Paguaj me keste deri ne 48
                            muaj
                            pa
                            interes! Menyrat tona te pageses jane:<h4>
                                <div class="iconsBuy">
                                    <img src="icons/mastercard.png" alt="Mastercard">
                                    <img src="icons/raiffaisen.png" alt="Raiffeisen">
                                    <img src="icons/paypal.png" alt="PayPal">
                                    <img src="icons/visa.png" alt="Visa">
                                </div>
                                <h4><i>Blej mire, blej sigurt. TECH SHOP©</i>
                                    <h4>
                    </div>
                </div>
            </div>
        </body>

        <?php
    }
}
include('footer.php');
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        setInterval(function () {
            $('.fade-text').fadeOut(500, function () {
                $(this).text($(this).text() == 'BLEJ MIRE, BLEJ SIGURT' ? ' ' : 'BLEJ MIRE, BLEJ SIGURT').fadeIn(500);
            });
        }, 3000);
    });
</script>

</html>