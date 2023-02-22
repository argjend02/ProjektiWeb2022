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

        // Check if $uploadOk is set to 0 by an error
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

    public function delete($id)
    {

        $query = "DELETE FROM users where id = '$id'";
        if ($sql = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function edit($id)
    {

        $data = null;

        $query = "SELECT * FROM users WHERE id = '$id'";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
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
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
?>