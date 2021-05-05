<?php

class PageModel
{
    private $database;

    public function __construct()
    {
        $this->database = new Database;
    }

    // Login User
    public function login($email, $password)
    {
        $this->database->query('SELECT * FROM users WHERE email = :email');
        $this->database->bind(':email', $email);

        $row = $this->database->single();

        $hashed_password = $row->password;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    // Find user by email
    public function findUserByEmail($email)
    {
        $this->database->query('SELECT * FROM users WHERE email = :email');
        // Bind value
        $this->database->bind(':email', $email);

        $row = $this->database->single();

        // Check row
        if ($this->database->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function addUser($data)
    {

        // preparation de la query 
        $this->database->query("INSERT INTO `users`( `username`, `email`, `password` , `repeat_password`) VALUES (:Username, :Email , :Password , :Repeat_Password)");


        // bind the values with placeholders

        $this->database->bind(':Username', $data['username']);
        $this->database->bind(':Email', $data['email']);
        $this->database->bind(':Password', $data['password']);
        $this->database->bind(':Repeat_Password', $data['repeat_password']);




        if ($this->database->execute()) {
            return true;
        } else {
            return false;
        }
    }
}