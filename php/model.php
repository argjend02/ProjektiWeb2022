<?php
class Model
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

    //INSERT, FETCH, EDIT, DELETE

    public function loginOrRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['email'])) {
                $type = $_POST['type'];
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $birthdate = $_POST['birthdate'];
                $email = $_POST['email'];
                $password = md5($_POST['password']);

                $existingUserQuery = "SELECT * FROM users WHERE email = '$email'";
                $existingUser = $this->conn->query($existingUserQuery);
                $userData = null;

                while ($row = mysqli_fetch_assoc($existingUser)) {
                    $userData[] = $row;
                }

                if ($type === "signUp") {
                    try {
                        if ($userData) {
                            throw new Exception('User with this email already exists!');
                        }
                        $query = "INSERT INTO users(name, surname, birthdate, email, password) VALUES ('$name','$surname', '$birthdate', '$email', '$password')";
                        if ($sql = $this->conn->query($query)) {
                            echo "<script>window.location.href = 'index.html';</script>";
                        } else {
                            echo "<script>
                                alert('loged in')
                                window.location.href = 'index.html';
                            </script>";
                        }
                        echo "<script>alert('User registered successfully')</script>";
                    } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo "<script>alert('$error')</script>";
                    }
                } else if ($type === "signIn") {
                    try {
                        if (!$userData || !$userData[0]) {
                            throw new Exception('User with this email doesn\'t exist');
                        }
                        if ($userData[0]['email'] == $email && $userData[0]['password'] == $password) {
                            $_SESSION["isLoggedIn"] = true;
                            echo "<script>alert('Logged in');window.location.href = 'index.html';</script>";
                        } else {
                            echo "<script>alert('Incorrect credentials')</script>";
                        }
                    } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo "<script>alert('$error')</script>";
                    }
                }
            }
        }
    }

    public function fetch()
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
}
?>