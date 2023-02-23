<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Product Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-color: #CAE4DB;">

    <?php
    include 'database/product.php';
    $model = new Product();
    $model->addProduct();
    ?>
    <?php include 'header.php';
    ?>
    <div class="dashboard">
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name of the product:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" min="0" required>
            </div>
            <div class="form-group">
                <label for="description">Category:</label>
                <select id="description" name="description" required>
                    <option value="">Select a category</option>
                    <option value="Laptop">Laptop</option>
                    <option value="White Tech">White Tech</option>
                    <option value="Console">Console</option>
                    <option value="Smartphone">Smartphone</option>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" required>
            </div>
            <button type="submit">Post Product</button>
        </form>
    </div>

    <?php include 'footer.php';
    ?>
</body>

</html>