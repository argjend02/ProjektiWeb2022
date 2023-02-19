<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Product Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include 'database/product.php';
    $model = new Product();
    $model->addProduct();
    ?>
    <div class="dashboard">
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="name">Price:</label>
                <input type="number" id="price" name="price" min="0" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" required>
            </div>
            <button type="submit">Post Product</button>
        </form>
    </div>
</body>

</html>