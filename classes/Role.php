<?php

class Role {
    
    //ATTRIBUTES
    private int $id;
    private string $name;
    private string $description;
    
    //CONSTRUCTOR
    public function __construct(string $name, string $description)
    {
        $this->id = -1;
        $this->name = $name;
        $this->description = $description;
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
    
    //NAME
    public function getName() : string
    {
        return $this->name;
    }
    public function setName(string $name) : void
    {
        $this->name = $name;
    }
    
    //DESCRIPTION
    public function getDescription() : string
    {
        return $this->description;
    }
    public function setDescription(string $description) : void
    {
        $this->description = $description;
    }
    
    //METHODS
    public function addRole(PDO $db, Role $role) : void
    {
        $query = $db->prepare(
        "INSERT INTO roles (name, description) 
        VALUES (:name, :description);");
        $parameters = [
            'name' => $role->getName(),
            'description' => $role->getDescription()];
        $query->execute($parameters);
    }
    
    public function removeRole(PDO $db, Role $role) : void
    {
        $query = $db->prepare(
        "DELETE FROM roles WHERE roles.name = :name;");
        $parameters = [
            'name' => $role->getName()];
        $query->execute($parameters);
    }
}

?>