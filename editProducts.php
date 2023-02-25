<html>

<head>
    <link rel="stylesheet" href="style.css">
    <style>
        .dashboard-edit {
            margin: 50px auto;
            max-width: 500px;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 10px;
        }

        .form-edit {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-group-edit {
            margin: 10px 0;
            width: 100%;

        }

        .label-edit {
            display: block;
            margin-bottom: 5px;
        }

        .input-edit,
        .select-edit {
            width: 100%;
            padding: 8px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 5px;
            box-sizing: border-box;

        }

        .button-edit[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-edit[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>

</head>
<?php include 'database/product.php';
$model = new Product();
$productId = $_GET['id'];
$product = $model->getIdActive($productId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model->editProduct($productId);
}

include('header.php');
?>

<div class="dashboard-edit">
    <form class="form-edit" action="#" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <div class="form-group-edit">
            <label class="label-edit" for="name">Name of the product:</label>
            <input class="input-edit" type="text" id="name" name="name" value="<?php echo $product['name']; ?>"
                required>
        </div>
        <div class="form-group-edit">
            <label class="label-edit" for="price">Price:</label>
            <input class="input-edit" type="number" id="price" name="price" min="0"
                value="<?php echo $product['price']; ?>" required>
        </div>
        <div class="form-group-edit">
            <label class="label-edit" for="description">Category:</label>
            <select class="select-edit" id="description" name="description" required>
                <option value="">Select a category</option>
                <option value="Laptop" <?php if ($product['description'] === 'Laptop')
                    echo ' selected'; ?>>Laptop
                </option>
                <option value="White Tech" <?php if ($product['description'] === 'White Tech')
                    echo ' selected'; ?>>White
                    Tech</option>
                <option value="Console" <?php if ($product['description'] === 'Console')
                    echo ' selected'; ?>>Console
                </option>
                <option value="Smartphone" <?php if ($product['description'] === 'Smartphone')
                    echo ' selected'; ?>>
                    Smartphone</option>
            </select>
        </div>
        <div class="form-group-edit">
            <label class="label-edit" for="image">
                <?php $product['image'] ?>
            </label>
            <input class="input-edit" type="file" id="image" name="image">
        </div>
        <button class='button-edit' type="submit">Edit Product</button>
    </form>
</div>
<?php include('footer.php'); ?>

</html>