<?php
class Kontakto
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


    public function getSubmission()
    {
        $sql = "SELECT * FROM contact_form_submissions";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $submissions = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $submissions[] = $row;
        }
        return $submissions;
    }


    public function addSubmission()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $request = $_POST['request'];

        $sql = "INSERT INTO contact_form_submissions (name, surname, email, request) VALUES (:name, :surname, :email, :request)";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':name', $name);
        $query->bindParam(':surname', $surname);
        $query->bindParam(':email', $email);
        $query->bindParam(':request', $request);

        if (!$query->execute()) {
            echo ('Failed to add submission');
        }
    }







}






















?>