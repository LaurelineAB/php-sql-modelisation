<?php

class PostCategory {
    
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
    public function addCategory(PDO $db, PostCategory $cat) : void
    {
        $query = $db->prepare(
        "INSERT INTO post_categories (name, description) 
        VALUES (?,?);");
        $query->execute([$cat->getName(), $cat->getDescription()]);
    }
    
    public function removeCategory(PDO $db, PostCategory $cat) : void
    {
        $query = $db->prepare(
        "DELETE FROM post_categories WHERE post_categories.name = :name;");
        $parameters = ['name' => $cat->getName()];
        $query->execute($parameters);
    }
    
    public function getCategoryId(PDO $db, string $catName) : int
    {
        
        $query = $db->prepare(
        "SELECT post_categories.id FROM post_categories WHERE post_categories.name = ? ");
        $query->execute([$catName]);
        $catId = $query->fetch(PDO::FETCH_ASSOC);
        // print_r($catId);
        return $catId['id'];
    }
}

?>