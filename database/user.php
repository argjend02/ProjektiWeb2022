<?php
class User
{
    private $server = 'localhost';
    private $username = 'root';
    private $password;
    private $database = 'ecommerce_db';
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->database);
        } catch (Exception $ex) {
            echo 'connection failed' . $ex->getMessage();
        }
    }

    public function loginOrRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['email'])) {
            return;
        }

        $type = $_POST['type'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $birthdate = $_POST['birthdate'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $existingUserQuery = "SELECT * FROM users WHERE email = '$email'";
        $existingUser = $this->conn->query($existingUserQuery);
        $userData = mysqli_fetch_assoc($existingUser);

        if ($type === "signUp") {
            if ($userData) {
                echo "<script>alert('User with this email already exists!')</script>";
                return;
            }
            $query = "INSERT INTO users(name, surname, birthdate, email, password) VALUES ('$name','$surname', '$birthdate', '$email', '$password')";
            if ($this->conn->query($query)) {
                setcookie('user', json_encode($userData), time() + (86400 * 30), "/");
                echo "<script>alert('User registered successfully')</script>";
            } else {
                echo "<script>alert('Registration failed. Please try again.')</script>";
            }
            echo "<script>window.location.href = 'index.php';</script>";
        } else if ($type === "signIn") {
            if (!$userData) {
                echo "<script>alert('User with this email doesn\'t exist')</script>";
                return;
            }
            if ($userData['email'] == $email && $userData['password'] == $password) {
                setcookie('user', json_encode($userData), time() + (86400 * 30), "/");
                echo "<script>window.location.href = 'index.php';</script>";
            } else {
                echo "<script>alert('Incorrect credentials')</script>";
            }
        }
    }

    public function getAllUsers()
    {
        $data = null;
        $query = "SELECT * FROM users";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }
        $user = json_decode($_COOKIE['user']);
        if (!isset($_COOKIE['user']) || !$user->isAdmin) {
            echo "<script>alert('You are not authorized to perform this action')</script>";
            return;
        }
        $id = $_POST['id'];
        $query = "DELETE FROM users where id = '$id'";
        if ($sql = $this->conn->query($query)) {
            header("Location: admin.php");
        } else {
            echo "<script>alert('User deletion unsucessful')</script>";
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
}
?>