<?php

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function register($name, $email, $password, $mobile, $address, $photo) {
      
        $targetDir = "uploads/";
        $photoPath = $targetDir . basename($photo["name"]);
        move_uploaded_file($photo["tmp_name"], $photoPath);
    
        
    
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("INSERT INTO reg (name, email, password, mobile, address, photo) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $email, $Password, $mobile, $address, $photoPath);
        $stmt->execute();
        $stmt->close();
    }
    
    public function login($email, $password) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT name, email, password ,mobile,address,photo FROM reg WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            $getPassword = $user['password'];
    
            if ($password === $getPassword) {
                return $user;
            }
        }
    
    
        return null;
    }
    


}
