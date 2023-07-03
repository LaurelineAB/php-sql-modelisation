<?php

class User {
    //ATTRIBUTES
    private int $id;
    private string $username;
    private string $password;
    private string $email;
    
    //CONSTRUCTOR
    public function __construct(string $username, string $password, string $email)
    {
        $this->id = -1;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }
    
    //ID
    public function getId() : int
    {
        return $this->id;
    }
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    //USERNAME
    public function getUsername() : string
    {
        return $this->username;
    }
    public function setUsername(string $username) : void
    {
        $this->username = $username;
    }
    
    //PASSWORD
    public function getPassword() : string
    {
        return $this->password;
    }
    public function setPassword(string $password) : void
    {
        $this->password = $password;
    }
    
    //EMAIL
    public function getEmail() : string
    {
        return $this->email;
    }
    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }
    
    //METHODS
    public function addUser(PDO $db, User $user) : void
    {
        $query = $db->prepare(
        "INSERT INTO users (email, username, password) 
        VALUES (?,?,?);");
        $query->execute([$user->getEmail(), $user->getUsername(), $user->getPassword()]);
    }
    
    public function removeUser(PDO $db, User $user) : void
    {
        $query = $db->prepare(
        "DELETE FROM users WHERE users.email = :email;");
        $parameters = ['email' => $user->getEmail()];
        $query->execute($parameters);
    }
    
    // public function getUserId (PDO $db, string $username) : int
    // {
    //     $query = $db->prepare(
    //     "SELECT users.id FROM users WHERE users.username = :username;");
    //     $parameters = ['username' => $user];
    //     $query->execute($parameters);
    //     $userId = $query->fetch(PDO::FETCH_ASSOC);
    //     return $userId['id'];
    // }
    
    // public function addRole(PDO $db, string $user, string $role)
    // {
    //     $query = $db->prepare(
    //     "SELECT users.id FROM users WHERE users.username = :username;");
    //     $parameters = ['email' => $user->getEmail()];
    //     $query->execute($parameters);
    // }
    
}


?>