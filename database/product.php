<?php
class Product
{
    private $server = 'localhost';
    private $username = 'root';
    private $password;
    private $database = 'ecommerce_db';
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->server;dbname=$this->database", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            echo 'connection failed' . $ex->getMessage();
        }
    }

    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }
        if (!isset($_COOKIE['user'])) {
            echo "<script>alert('You are not logged in')</script>";
            return;
        }

        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];


        $target_dir = "uploads/"; // specify the directory where you want to save the image
        $target_file = $target_dir . basename($_FILES["image"]["name"]); // get the path of the file
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // get the file extension

        $user = json_decode($_COOKIE["user"]);
        $image = $_FILES["image"]["name"];
        $user_id = $user->id;

        $sql = "INSERT INTO products(name, description, price, image, user_id) VALUES (:name, :description, :price, :image, :user_id)";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':name', $name);
        $query->bindParam(':description', $description);
        $query->bindParam(':price', $price);
        $query->bindParam(':image', $image);
        $query->bindParam(':user_id', $user_id);

        $uploadOk = true;

        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            echo "<script>alert('Sorry, your file is too large.')</script>";
            $uploadOk = false;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        ) {
            echo "<script>alert('Sorry, only JPG, JPEG, PNG files are allowed.')</script>";
            $uploadOk = false;
        }


        if (!$uploadOk) {
            echo "<script>alert('Sorry, your file was not uploaded.</script>";
            // if everything is ok, try to upload file
        } else {

            if ($query->execute() && move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "<script>alert('The file " . basename($_FILES["image"]["name"]) . " has been uploaded.'); window.location.href = 'products.php';</script>";
            } else {
                echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
            }
        }
    }

    public function getProducts()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $products = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $products[] = $row;
        }
        return $products;
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        $id = $_POST['id'];
        $query = "DELETE FROM products where id = '$id'";
        if ($this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data)
    {

        $query = "UPDATE users SET name='$data[name]', email='$data[email]', mobile='$data[mobile]', address='$data[address]' WHERE id='$data[id] '";

        if ($sql = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function getIdActive($id)
    {
        $query = "SELECT p.*, u.name AS user_name FROM products p
                  INNER JOIN users u ON p.user_id = u.id
                  WHERE p.id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getProductByUserId($userId)
    {
        $query = "SELECT * FROM products WHERE products.user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editProduct($id)
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_FILES['image']['name'];

        if ($_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            // A new image file is uploaded, update the image column
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            $uploadOk = true;
            // Check file size and allowed file types
            if ($_FILES["image"]["size"] > 500000 || !in_array($imageFileType, array("jpg", "jpeg", "png"))) {
                echo "<script>alert('Sorry, only JPG, JPEG, PNG files under 500KB are allowed.')</script>";
                $uploadOk = false;
            }
            if ($uploadOk) {
                if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
                    $uploadOk = false;
                }
            }

            if ($uploadOk) {
                $query = "UPDATE products SET name='$name', description='$description', price='$price', image='$image' WHERE id='$_POST[id]'";
            }
        } else {
            // No new image file is uploaded, do not update the image column
            $query = "UPDATE products SET name='$name', description='$description', price='$price' WHERE id='$_POST[id]'";
        }

        if ($this->conn->query($query)) {
            echo "<script>alert('Your product has been updated successfully')</script>";
            echo "<script>window.location.replace('myProducts.php')</script>";
        } else {
            echo "<script>alert('Updating product failed')</script>";
        }
    }



}






?>