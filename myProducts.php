<html>
<link rel="stylesheet" href="style.css">
<style>
    table {
        border-collapse: collapse;
        width: 90%;
        margin: 50px auto;
        font-family: Arial, sans-serif;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    th,
    td {
        text-align: center;
        padding: 15px 20px;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
        font-weight: bold;
    }

    td {
        background-color: #f7f7f7;
        color: #333;
    }

    .button {
        padding: 8px 15px;
        border: none;
        border-radius: 5px;
        color: white;
        background-color: red;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

    .button1 {
        padding: 8px 15px;
        border: none;
        border-radius: 5px;
        color: white;
        background-color: #57ad5f;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

    .button1:hover {
        background-color: green;
    }

    .button:hover {
        background-color: #522a2f;
    }



    h2 {
        margin-top: 20px;
        text-align: center;
        font-size: 24px;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #555;
    }

    form {
        display: inline-block;
    }
</style>


<?php
include_once('database/product.php');
$model = new Product();
$model->delete();
$user = json_decode($_COOKIE['user']);
$userId = $user->id;
$result = $model->getProductByUserId($userId);
$username = $user->name;




include 'header.php';
?>

<table style="margin-top:100px">
    <thead>
        <tr>
            <th>Name of the product</th>
            <th>Price</th>
            <th>Category</th>
            <th>Posted by</th>
            <th>Delete / Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $product): ?>
            <tr>
                <td>
                    <?php echo $product['name'] ?>
                </td>
                <td>
                    <?php echo $product['price'] ?>
                </td>
                <td>
                    <?php echo $product['description'] ?>
                </td>
                <td>
                    <?php echo $username ?>
                </td>
                <td>
                    <form method="post" action="#">
                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>" id="">
                        <button class="button" type="submit" name="delete" class="button" style="">Delete</button>
                    </form>
                    <form method="get" action="editProducts.php">
                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>" id="">
                        <button class="button1" style="width:70px;" type="submit" name="edit" class="button">Edit</button>
                    </form>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'footer.php'; ?>

</html>